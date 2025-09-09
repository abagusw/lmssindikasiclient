<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MasterCityModel;
use App\Models\MasterSubsektor;
use App\Models\MasterJabatan;
use App\Models\PengalamanModel;
use App\Models\PendidikanModel;
use App\Models\MemberModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->masterCityModel = new MasterCityModel();
        $this->masterSubsektor = new MasterSubsektor();
        $this->masterJabatan = new MasterJabatan();
    }

    protected function _validation()
    {
        if ($this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_numeric|is_unique[user.username,id,{id}]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ]
        ])) {
            return true;
        }
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'users' => $this->userModel->getUser(),
            'session' => \Config\Services::session()
        ];

        return view('user/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'User',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'validation' => \Config\Services::validation()
        ];

        return view('user/new', $data);
    }

    public function create()
    {
        if ($this->_validation() == false) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/new')->withInput()->with('validation', $validation);
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('username'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'is_active' => 1,
            'created_at' => date('yy-m-d H:m:s'),
            'updated_at' => date('yy-m-d H:m:s')
        ];

        $this->userModel->save($data);

        return redirect()->to('/user')->with('msg', 'Data berhasil ditambah.');
    }

    public function edit($username)
    {
        $data = [
            'title' => 'User',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'user' => $this->userModel->getUser($username),
            'validation' => \Config\Services::validation()
        ];

        return view('user/edit', $data);
    }

    public function update($id)
    {
        if ($this->_validation() == false) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('username'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'updated_at' => date('yy-m-d H:m:s')
        ];

        $this->userModel->save($data);

        return redirect()->to('/user')->with('msg', 'Data berhasil diedit.');
    }

    public function changeStatus($username)
    {
        $user = $this->userModel->getUser($username);

        $data = [
            'id' => $user['id'],
            'is_active' => !$user['is_active']
        ];

        $this->userModel->save($data);

        return redirect()->to('/user')->with('msg', 'diedit');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/user')->with('msg', 'Data berhasil dihapus.');
    }

    public function profile()
    {
        $this->session = \Config\Services::session();
        $userId = session()->get('id');
        $expModel = new \App\Models\PengalamanModel();
        $eduModel = new \App\Models\PendidikanModel();
        $member  = (new MemberModel())->find($userId);
        $experiences = $expModel
            ->where('user_id', $userId)
            ->orderBy('is_current', 'DESC') 
            ->orderBy('start_year', 'DESC')
            ->orderBy('start_month', 'DESC')
            ->findAll();
                        $db = \Config\Database::connect();
            log_message('debug', 'LAST Q: '.$db->getLastQuery());

        $educations = $eduModel
            ->where('user_id', $userId)
            ->orderBy('is_current', 'DESC') 
            ->orderBy('start_year', 'DESC')
            ->orderBy('start_month', 'DESC')
            ->findAll();

        $disStr = (string) ($member['disabilitas'] ?? '');
        $disArr = array_values(array_filter(array_map('trim', explode(',', $disStr))));



        $data = [
            'title' => 'My Profile',
            'user_logged_in' => $this->userModel->find($this->session->get('id')),
            'getCityById' => $this->masterCityModel->where('id',$this->session->get('domisili'))->first(),
            'session' => \Config\Services::session(),
            'getCity' => $this->masterCityModel->findAll(),
            'getDataJabatan' => $this->masterJabatan->findAll(),
            'getDataSubsektor' => $this->masterSubsektor->findAll(),
            'validation' => \Config\Services::validation(),
            'experiences' => $experiences,
            'educations' => $educations,
            'member' => $member,
            'disArr' => $disArr
        ];

        return view('user/profile', $data);
    }


    public function saveExperience()
    {
        if (!$this->request->isAJAX()) return $this->response->setStatusCode(400)->setJSON(['ok'=>false,'msg'=>'Bad request']);

        $rules = [
            'role'        => 'required',
            'company'     => 'required',
            'industry'    => 'required',
            'start_month' => 'required|integer',
            'start_year'  => 'required|integer',
        ];
        if (!$this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'errors'=>$this->validator->getErrors()]);
        }

        $isCurrent = (int) $this->request->getPost('is_current');
        $data = [
            'user_id'     => $this->session->get('id'),
            'role'        => $this->request->getPost('role'),
            'company'     => $this->request->getPost('company'),
            'industry'    => $this->request->getPost('industry'),
            'start_month' => (int)$this->request->getPost('start_month'),
            'start_year'  => (int)$this->request->getPost('start_year'),
            'end_month'   => $isCurrent ? null : (int)$this->request->getPost('end_month'),
            'end_year'    => $isCurrent ? null : (int)$this->request->getPost('end_year'),
            'is_current'  => $isCurrent,
            'description' => $this->request->getPost('description'),
        ];

        $id = (new PengalamanModel())->insert($data, true);
        return $this->response->setJSON(['ok'=>true, 'id'=>$id]);
    }

    public function listExperience()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['ok'=>false]);
        }
        $userId = session()->get('user_id');
        $rows = (new \App\Models\PengalamanModel())
            ->where('user_id', $userId)
            ->orderBy('is_current', 'DESC')
            ->orderBy('start_year', 'DESC')
            ->orderBy('start_month', 'DESC')
            ->findAll();

        return $this->response->setJSON(['ok'=>true,'data'=>$rows]);
    }


    public function saveEducation()
    {
        if (!$this->request->isAJAX()) return $this->response->setStatusCode(400)->setJSON(['ok'=>false,'msg'=>'Bad request']);

        $rules = [
            'institution' => 'required',
            'major'       => 'required',
            'start_month' => 'required|integer',
            'start_year'  => 'required|integer',
        ];
        if (!$this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'errors'=>$this->validator->getErrors()]);
        }

        $isCurrent = (int) $this->request->getPost('is_current');
        $data = [
            'user_id'     => $this->session->get('id'),
            'institution' => $this->request->getPost('institution'),
            'major'       => $this->request->getPost('major'),
            'start_month' => (int)$this->request->getPost('start_month'),
            'start_year'  => (int)$this->request->getPost('start_year'),
            'end_month'   => $isCurrent ? null : (int)$this->request->getPost('end_month'),
            'end_year'    => $isCurrent ? null : (int)$this->request->getPost('end_year'),
            'is_current'  => $isCurrent,
        ];

        $id = (new PendidikanModel())->insert($data, true);
        return $this->response->setJSON(['ok'=>true, 'id'=>$id]);
    }    

    public function changeProfile($id)
    {
        $validate = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_numeric|is_unique[user.username,id,{id}]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.'
                ]
            ]
        ]);

        if (!$validate) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'updated_at' => date('yy-m-d H:m:s')
        ];

        $this->userModel->save($data);

        return redirect()->back()->with('msg', 'Profile berhasil diedit.');
    }

    public function updatePassword()
    {
        $userId  = session()->get('id');
        $current = (string) $this->request->getPost('current_password');
        $new     = (string) $this->request->getPost('new_password');
        $confirm = (string) $this->request->getPost('new_password_confirm');

        if ($new !== $confirm) {
            return redirect()->back()->withInput()->with('error','Konfirmasi tidak cocok.');
        }

        $model = new \App\Models\MemberModel();
        $user  = $model->find($userId);
        if (!$user) {
            return redirect()->back()->with('error','User tidak ditemukan.');
        }

        $stored = $user['password'] ?? ($user['password'] ?? null);
        if ($stored === null) {
            return redirect()->back()->with('error','Kolom password tidak ditemukan pada data user.');
        }

        $isHash = is_string($stored) && preg_match('/^\$(2y|2a|2b|argon2id|argon2i)\$/', $stored);

        $valid = false;
        if ($isHash) {
            $valid = password_verify($current, $stored);
        } else {
            $valid = hash_equals((string)$stored, $current);
        }

        if (!$valid) {
            return redirect()->back()->withInput()->with('error', 'Kata kunci saat ini salah.');
        }


        if ($isHash && password_verify($new, $stored)) {
            return redirect()->back()->withInput()->with('error', 'Kata kunci baru tidak boleh sama.');
        }
        if (!$isHash && $new === $stored) {
            return redirect()->back()->withInput()->with('error', 'Kata kunci baru tidak boleh sama.');
        }


        $newHash = password_hash($new, PASSWORD_DEFAULT);


        $save = [];
        if (array_key_exists('password_hash', $user)) $save['password_hash'] = $newHash;
        else $save['password'] = $newHash;

        $model->update($userId, $save);


        return redirect()->back()->with('success','Kata kunci berhasil diperbarui.');
    }

public function saveProfile()
{
    if (!$this->request->isAJAX()) {
        return $this->response->setStatusCode(400)->setJSON(['ok'=>false,'error'=>'Bad request']);
    }

    $userId = session()->get('id');
    if (!$userId) {
        return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'error'=>'Unauthorized']);
    }

    // --- Ambil payload draft baru ---
    $exps = json_decode($this->request->getPost('experiences_json') ?? '[]', true) ?: [];
    $edus = json_decode($this->request->getPost('educations_json') ?? '[]', true) ?: [];

    // --- Ambil payload patch (update/delete untuk data DB) ---
    $expUpdates = json_decode($this->request->getPost('experiences_updates_json') ?? '[]', true) ?: [];
    $expDeletes = json_decode($this->request->getPost('experiences_deletes_json') ?? '[]', true) ?: [];
    $eduUpdates = json_decode($this->request->getPost('educations_updates_json') ?? '[]', true) ?: [];
    $eduDeletes = json_decode($this->request->getPost('educations_deletes_json') ?? '[]', true) ?: [];

    // --- Form inputs lainnya ---
    $bahasa = $this->request->getPost('bahasa');
    if (!is_array($bahasa)) $bahasa = [];
    $bahasa = array_values(array_unique(array_map('trim', $bahasa)));

    $rules = [
        'fullname' => 'required|min_length[3]',
        'email'    => 'required|valid_email',
        'telp'     => 'required',
        'gender'   => 'required',
        'kota_kelahiran' => 'required',
        'tanggal_lahir'  => 'required|valid_date',
        'kota_domisili'  => 'required',
        'pendidikan_terakhir' => 'required',
        'nama_instansi_pendidikan' => 'required',
    ];
    if (! $this->validate($rules)) {
        return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'errors'=>$this->validator->getErrors()]);
    }

    $disArr = $this->request->getPost('disabilitas') ?? [];
    if (!is_array($disArr)) $disArr = [$disArr];

    // skills (chips)
    $skillsArr = json_decode($this->request->getPost('skills') ?? '[]', true);
    if (!is_array($skillsArr)) $skillsArr = [];
    $clean = [];
    foreach ($skillsArr as $s) {
        $s = trim((string)$s);
        if ($s === '') continue;
        if (mb_strlen($s) > 100) $s = mb_substr($s, 0, 100);
        $clean[strtolower($s)] = $s;
    }
    $clean = array_slice(array_values($clean), 0, 50);

    $data = [
        'nama_lengkap'              => $this->request->getPost('fullname'),
        'nama_panggilan'            => $this->request->getPost('nama_panggilan'),
        'referensi'                 => $this->request->getPost('referensi'),
        'email'                     => $this->request->getPost('email'),
        'no_hp'                     => $this->request->getPost('telp'),
        'jenis_kelamin'             => $this->request->getPost('gender'),
        'tempat_lahir'              => $this->request->getPost('kota_kelahiran'),
        'tanggal_lahir'             => $this->request->getPost('tanggal_lahir'),
        'domisili'                  => $this->request->getPost('kota_domisili'),
        'pendidikan_terakhir'       => $this->request->getPost('pendidikan_terakhir'),
        'nama_instansi_pendidikan'  => $this->request->getPost('nama_instansi_pendidikan'),
        'pengalaman_organisasi'     => $this->request->getPost('pengalaman_organisasi'),
        'disabilitas'               => implode(',', $disArr),
        'disabilitas_lainnya'       => $this->request->getPost('disabilitas_lainnya'),
        'link_instagram'            => $this->request->getPost('link_instagram'),
        'link_twitter'              => $this->request->getPost('link_twitter'),
        'link_facebook'             => $this->request->getPost('link_facebook'),
        'link_linkedin'             => $this->request->getPost('link_linkedin'),
        'keahlian'                  => json_encode($clean, JSON_UNESCAPED_UNICODE),
        'bahasa'                    => json_encode($bahasa, JSON_UNESCAPED_UNICODE),
        'biografi'                  => $this->request->getPost('biografi'),
    ];

    $db = \Config\Database::connect();
    $memberModel = new \App\Models\MemberModel();
    $now = date('Y-m-d H:i:s');

    // helper untuk normalisasi payload exp/edu
    $normExp = function(array $x): array {
        $isCur = !empty($x['is_current']) ? 1 : 0;
        return [
            'role'        => $x['role']        ?? null,
            'company'     => $x['company']     ?? null,
            'industry'    => $x['industry']    ?? null,
            'start_month' => isset($x['start_month']) ? (int)$x['start_month'] ?: null : null,
            'start_year'  => isset($x['start_year'])  ? (int)$x['start_year']  ?: null : null,
            'is_current'  => $isCur,
            'end_month'   => $isCur ? null : (isset($x['end_month']) ? (int)$x['end_month'] ?: null : null),
            'end_year'    => $isCur ? null : (isset($x['end_year'])  ? (int)$x['end_year']  ?: null : null),
            'description' => $x['description'] ?? null,
        ];
    };
    $normEdu = function(array $e): array {
        $isCur = !empty($e['is_current']) ? 1 : 0;
        return [
            'institution' => $e['institution'] ?? null,
            'major'       => $e['major']       ?? null,
            'start_month' => isset($e['start_month']) ? (int)$e['start_month'] ?: null : null,
            'start_year'  => isset($e['start_year'])  ? (int)$e['start_year']  ?: null : null,
            'is_current'  => $isCur,
            'end_month'   => $isCur ? null : (isset($e['end_month']) ? (int)$e['end_month'] ?: null : null),
            'end_year'    => $isCur ? null : (isset($e['end_year'])  ? (int)$e['end_year']  ?: null : null),
        ];
    };

    $db->transStart();

    // 1) Update profil
    if (! $memberModel->update($userId, $data)) {
        $db->transRollback();
        return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'error'=>'Gagal menyimpan profil']);
    }

    // 2) PATCH DB: Hapus pengalaman/pendidikan yang ditandai
    if (!empty($expDeletes)) {
        // pastikan hanya milik user
        $db->table('tb_pengalaman')
           ->where('user_id', $userId)
           ->whereIn('id', array_map('intval', $expDeletes))
           ->delete();
    }
    if (!empty($eduDeletes)) {
        $db->table('tb_pendidikan')
           ->where('user_id', $userId)
           ->whereIn('id', array_map('intval', $eduDeletes))
           ->delete();
    }

    // 3) PATCH DB: Update pengalaman/pendidikan yang diedit
    if (!empty($expUpdates)) {
        foreach ($expUpdates as $row) {
            if (empty($row['id'])) continue;
            $payload = $normExp($row);
            // minimal validasi
            if (empty($payload['role']) || empty($payload['company'])) continue;

            $payload['updated_at'] = $now;
            $db->table('tb_pengalaman')
               ->where('id', (int)$row['id'])
               ->where('user_id', $userId)
               ->update($payload);
        }
    }
    if (!empty($eduUpdates)) {
        foreach ($eduUpdates as $row) {
            if (empty($row['id'])) continue;
            $payload = $normEdu($row);
            if (empty($payload['institution']) || empty($payload['major'])) continue;

            $payload['updated_at'] = $now;
            $db->table('tb_pendidikan')
               ->where('id', (int)$row['id'])
               ->where('user_id', $userId)
               ->update($payload);
        }
    }

    // 4) INSERT draft baru (yang dari localStorage)
    if (is_array($exps) && !empty($exps)) {
        $rows = [];
        foreach ($exps as $x) {
            $payload = $normExp($x);
            if (empty($payload['role']) || empty($payload['company'])) continue;
            $rows[] = $payload + [
                'user_id'    => $userId,
                'created_at' => $now,
            ];
        }
        if (!empty($rows)) {
            $db->table('tb_pengalaman')->insertBatch($rows);
        }
    }
    if (is_array($edus) && !empty($edus)) {
        $rows = [];
        foreach ($edus as $e) {
            $payload = $normEdu($e);
            if (empty($payload['institution']) || empty($payload['major'])) continue;
            $rows[] = $payload + [
                'user_id'    => $userId,
                'created_at' => $now,
            ];
        }
        if (!empty($rows)) {
            $db->table('tb_pendidikan')->insertBatch($rows);
        }
    }

    $db->transComplete();

    if ($db->transStatus() === false) {
        return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'error'=>'Gagal menyimpan data pengalaman/pendidikan']);
    }

    // set session ringan (opsional)
    session()->set('domisili', $this->request->getPost('kota_domisili'));

    return $this->response->setJSON(['ok'=>true,'token'=>csrf_hash()]);
}


    public function deactiveProfile(){
        $userId = session()->get('id');

        $data = [
                'flag_active'            => 2,
        ];

        $memberModel = new \App\Models\MemberModel();

        if (! $memberModel->update($userId, $data)) {
            $db->transRollback();
            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'error'=>'Gagal menyimpan']);
        }

        return $this->response->setJSON(['ok'=>true,'token'=>csrf_hash()]);
    }
}
