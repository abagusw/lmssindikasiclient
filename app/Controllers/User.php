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
            'member' => $member
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
    if (!$this->request->isAJAX()) return $this->response->setStatusCode(400)->setJSON(['ok'=>false,'error'=>'Bad request']);

    $userId = session()->get('id');
    if (!$userId) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'error'=>'Unauthorized']);

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

    $data = [
        'nama_lengkap'            => $this->request->getPost('fullname'),
        'nama_panggilan'          => $this->request->getPost('nama_panggilan'),
        'referensi'               => $this->request->getPost('referensi'),
        'email'                   => $this->request->getPost('email'),
        'no_hp'                   => $this->request->getPost('telp'),
        'jenis_kelamin'           => $this->request->getPost('gender'),
        'tempat_lahir'            => $this->request->getPost('kota_kelahiran'),
        'tanggal_lahir'           => $this->request->getPost('tanggal_lahir'),
        'domisili'                => $this->request->getPost('kota_domisili'),
        'pendidikan_terakhir'     => $this->request->getPost('pendidikan_terakhir'),
        'nama_instansi_pendidikan'=> $this->request->getPost('nama_instansi_pendidikan'),
        'pengalaman_organisasi'   => $this->request->getPost('pengalaman_organisasi'),
        'disabilitas'             => json_encode($disArr, JSON_UNESCAPED_UNICODE),
        'disabilitas_lainnya'     => $this->request->getPost('disabilitas_lainnya'),
        'link_instagram'          => $this->request->getPost('link_instagram'),
        'link_twitter'            => $this->request->getPost('link_twitter'),
        'link_facebook'           => $this->request->getPost('link_facebook'),
        'link_linkedin'           => $this->request->getPost('link_linkedin'),
    ];

    $ok = (new \App\Models\MemberModel())->update($userId, $data);
    if (!$ok) return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'error'=>'Gagal menyimpan']);

    return $this->response->setJSON(['ok'=>true,'token'=>csrf_hash()]);
}
}
