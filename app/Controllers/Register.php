<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MemberModel;
use App\Models\MasterSubsektor;
use App\Models\MasterJabatan;
use App\Models\MasterCityModel;
use App\Libraries\MyEncrypter;



class Register extends BaseController
{

    public function __construct()
    {
        $this->masterCityModel = new MasterCityModel();
        $this->masterSubsektor = new MasterSubsektor();
        $this->masterJabatan = new MasterJabatan();
    }

	public function formRegisterNextX()
	{
        $config = new EncryptionConfig();
        $encrypter = new OpenSSLHandler($config);

        $data = json_encode([
            'fullname' => 'Devanda',
            'email'    => 'devanda@example.com',
        ]);

        $encrypted = urlencode($encrypter->encrypt($data));
        dd($encrypted);
        return redirect()->to(base_url('user/terima?data=' . $encrypted));
	}

    public function set_password(){
        $encrypter = new MyEncrypter();

        $token = $this->request->getGet('accountregister');
        $token = str_replace(' ', '+', $token);

        $ciphertext = $encrypter->decrypt($token);  

        $dataKey = json_decode($ciphertext);

        $data = [
            'dataKey' => $dataKey,
        ];
        return view("register/bg_set_password",$data);
    }

	public function proseRegister(){
        $model = new MemberModel();
		$fullname = $this->request->getPost('fullname');
		$email = $this->request->getPost('email');
		$encrypter = new MyEncrypter();
		$data = json_encode([
        'fullname' => $fullname,
        'email'    => $email,
    	]);

        $cekMember = $model->getMemberByEmail($email);
        if($cekMember->getNumRows() > 0){
            echo "1";
        }else{
		  $ciphertext = $encrypter->encrypt($data);	
		  echo $ciphertext;		
        }
	}

	public function formRegisterNext(){
		$encrypter = new MyEncrypter();

		$token = $this->request->getGet('token');
		$token = str_replace(' ', '+', $token);

        $ciphertext = $encrypter->decrypt($token);	

        $dataKey = json_decode($ciphertext);

        $data = [
            'dataKey' => $dataKey,
            'getCity' => $this->masterCityModel->findAll(),
            'getDataJabatan' => $this->masterJabatan->findAll(),
            'getDataSubsektor' => $this->masterSubsektor->findAll(),
        ];
        return view("register/bg_form",$data);
	}

    public function save()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'fullname' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telp' => 'required|numeric|min_length[9]',
            'gender' => 'required',
            'kota_kelahiran' => 'required',
            'kota_domisili' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_instansi_pendidikan' => 'required',
            'subsektor' => 'required',
            'instansi' => 'required',
            'jabatan' => 'required',
            'status_ketenagakerjaan' => 'required',
            'bpjstk' => 'required',
            'bpjsks' => 'required',
            'status_anggota_bpjstk' => 'required',
            'status_anggota_bpjsks' => 'required',
            'alasan_bergabung_sindikasi' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new MemberModel();
        $masalahKetenagakerjaan = $this->request->getPost('masalah_ketenagakerjaan');
        $masalahKetenagakerjaanStr = is_array($masalahKetenagakerjaan) ? implode(',', $masalahKetenagakerjaan) : null;
        $pakta = $this->request->getPost('pakta_integritas'); // array
        $pakta_integritas = implode(', ', $pakta); // simpan jadi string

        $pernyataanKeanggotaan = $this->request->getPost('pernyataan_keanggotaan');
        $pernyataanKeanggotaanStr = is_array($pernyataanKeanggotaan) ? implode(',', $pernyataanKeanggotaan) : null;


        $data = [
            'nama_lengkap' => $this->request->getPost('fullname'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('telp'),
            'jenis_kelamin' => $this->request->getPost('gender'),
            'tempat_lahir' => $this->request->getPost('kota_kelahiran'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'domisili' => $this->request->getPost('kota_domisili'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'nama_instansi_pendidikan' => $this->request->getPost('nama_instansi_pendidikan'),
            'pengalaman_organisasi' => $this->request->getPost('pengalaman_organisasi'),
            'referensi' => $this->request->getPost('referensi'),
            'subsektor' => $this->request->getPost('subsektor'),
            'instansi' => $this->request->getPost('instansi'),
            'profesi' => $this->request->getPost('jabatan'),
            'status_ketenagakerjaan' => $this->request->getPost('status_ketenagakerjaan'),
            'deskripsi_pekerjaan' => $this->request->getPost('deskripsi_pekerjaan'),
            'jenis_masalah_lainnya' => $this->request->getPost('jenis_masalah_lainnya'),
            'alasan_bergabung_sindikasi' => $this->request->getPost('alasan_bergabung_sindikasi'),
            'disabilitas' => implode(',', is_array($this->request->getPost('disabilitas')) ? $this->request->getPost('disabilitas') : []),

            'disabilitas_lainnya' => $this->request->getPost('disabilitas_lainnya'),
            'bpjstk' => $this->request->getPost('bpjstk'),
            'bpjsks' => $this->request->getPost('bpjsks'),
            'status_anggota_bpjstk' => $this->request->getPost('status_anggota_bpjstk'),
            'status_anggota_bpjsks' => $this->request->getPost('status_anggota_bpjsks'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            'link_twitter' => $this->request->getPost('link_twitter'),
            'link_facebook' => $this->request->getPost('link_facebook'),
            'link_linkedin' => $this->request->getPost('link_linkedin'),
            'created_at' => date('Y-m-d H:i:s'),
            'masalah_ketenagakerjaan_lain' => $this->request->getPost('jenis_masalah_lainnya'),
            'flag' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'create_at' => date('Y-m-d H:i:s'),
            'masalah_ketenagakerjaan' => $masalahKetenagakerjaanStr,
            'pakta_integritas' => $pakta_integritas,
            'pernyataan_keanggotaan' => $pernyataanKeanggotaanStr



        ];

        $insert = $model->insert($data);
        if($insert){
            $encrypter = new MyEncrypter();
            $data = json_encode([
                'fullname' => $this->request->getPost('fullname'),
                'email'    => $this->request->getPost('email'),
            ]);
            $ciphertext = $encrypter->encrypt($data);
            $jsonResp = json_encode(array('msg'=>0,'desc'=>"Pendaftaran berhasil",'token'=>$ciphertext));
            echo $jsonResp;

        }

        //return $this->response->setJSON(['status' => 'success']);

    }

    public function registerSuccess(){
        $encrypter = new MyEncrypter();

        $token = $this->request->getGet('token');
        $token = str_replace(' ', '+', $token);

        $ciphertext = $encrypter->decrypt($token);  

        $dataKey = json_decode($ciphertext);

        $data = [
            'dataKey' => $dataKey,
        ];
        return view("register/reg_success",$data);        
    }

    public function simpanPassword(){
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'Permintaan tidak valid.'
            ]);
        }

        $rules = [
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => implode(', ', $this->validator->getErrors()),
                'csrf' => csrf_hash()
            ]);
        }

        $password = $this->request->getPost('password');
        $id = $this->request->getPost('id');
        $token = $this->request->getPost('token');

        $model = new MemberModel();

        // Simpan password baru
        $model->update($id, [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Password berhasil diperbarui.',
            'csrf' => csrf_hash()
        ]);
    }  

    public function setPassSuccess(){
        return view("register/set_password_success");        
    }      

}
