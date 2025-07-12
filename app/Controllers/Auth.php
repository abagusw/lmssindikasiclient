<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;
use CodeIgniter\Email\Email;
use App\Libraries\MyEncrypter;


class Auth extends BaseController
{

	public function insertLog($desk){
            $logModel = new LogModel();
            $dataLog = [
                'description'   => $desk,
                'create_date'   => date('Y-m-d H:i:s'),
                'create_user'   => $this->session->get('nama')
            ];

            $logModel->insert($dataLog);

            // if ($logModel->insert($dataLog)) {
            //     //echo json_encode(array('msg'=>0,'desc'=>"Sukses Insert Data"));
            // }
    }


	public function index()
	{
		if ($this->session->get('logged_in')) {
			return redirect()->to('/dashboard');
		}

		$data = [
			'session' => \Config\Services::session(),
			'validation' => \Config\Services::validation()
		];

		return view('auth/login', $data);
	}

	public function cekLogin()
	{
	    $email = $this->request->getPost('email');
	    $password = $this->request->getPost('password');

	    $userModel = new UserModel;
	    $user = $userModel->where('email', $email)->first();

	    $token = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

	 //    var_dump($password);                 // password yang dikirim user
		// var_dump($user['password']);        // hash dari database
		// var_dump(password_verify($password, $user['password']));
// 		$password = '123456';
// $hash = '$2y$10$B16I392Q9k0U6UGaXDFgQ.FSJUm4zDpXedgZPjlGufXuZWoMxY9QO';

// var_dump(password_verify($password, $hash)); // Harusnya bool(true)

		// exit; // hentikan dulu untuk lihat hasil
	    if ($user) {
	        if ($user && password_verify($password, $user['password'])) {
	            // Password cocok
	            session()->set([
	                'id' => $user['id'],
	                'email' => $user['email'],
	                'nama_lengkap' => $user['nama_lengkap'],
	                'nama_panggilan' => $user['nama_panggilan'],
	                'logged_in' => true
	            ]);
	            $now = new \DateTime();
				$now->modify('+1 hour');
	            $respMessage = "Login berhasil";
                $respCode = "0";
                $encrypter = new MyEncrypter();
		        $data = json_encode([
		            'email'    => $email,
		        ]);
		        $ciphertext = $encrypter->encrypt($data);
                $rsp = $ciphertext;
                $userModel->update($user['id'], [
			        'token' => $token,
			        'token_expired' => $now->format('Y-m-d H:i:s')
			    ]);
                $this->sendAsyncRequest($this->kirimEmailToken($email,$token,$now->format('Y-m-d H:i:s')));
	        } else {
	            $respMessage = "Password Salah";
                $respCode = "1";
                $rsp = '';
	        }
	    } else {
	        	$respMessage = "Email tidak ditemukan";
                $respCode = "99";
                $rsp = '';
	    }

	    $resp =  json_encode([
            'respCode' => $respCode,
            'respMessage'=>$respMessage,
            'rsp' => $rsp 
        ]);

        // print_r($resp);
        // die;

        $desk = "Login akses email : ".$email." dengan response : ".$resp."";

        //$this->insertLog();
        return $resp;

	}


	public function logout()
	{
		// remove session
		session()->destroy();

		return redirect()->to('/')->with('msg', '<div class="alert alert-info">Logout berhasil.</div>');
	}

	public function register(){

		return view('register/bg_register');		
	}

	public function resendTokenLogin(){
		$userModel = new UserModel;
        $email = $this->request->getPost('email');
       	$user = $userModel->where('email', $email)->first();
        $token = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $now = new \DateTime();
		$now->modify('+1 hour');
		$userModel->update($user['id'], [
		    'token' => $token,
		    'token_expired' => $now->format('Y-m-d H:i:s')
		]);
		$this->sendAsyncRequest($this->kirimEmailToken($email,$token,$now->format('Y-m-d H:i:s')));	
	}

	public function verifikasiTokenLogin(){
		$userModel = new UserModel;
        $token = $this->request->getPost('token');
        $email = $this->request->getPost('email');
        $datNow = date('Y-m-d H:i:s');
       	$user = $userModel->where('email', $email)->first();

       	if($token != $user['token']){
       		$respCode = 1;
       		$respMessage = "Token yang Anda masukkan salah. Silakan periksa kembali atau minta token baru.";
       	}elseif($user['token_expired'] < $datNow){
       		$respCode = 1;
       		$respMessage = "Token expired ! silakan minta token baru.";
       	}else{
			$respCode = 0;
       		$respMessage = "Login Sukses";
       	}

       	$resp =  json_encode([
            'respCode' => $respCode,
            'respMessage'=>$respMessage
        ]);

        return $resp;
	}

	

	public function form_token_login(){
		$encrypter = new MyEncrypter();

        $email = $this->request->getGet('rsp');
        $email = str_replace(' ', '+', $email);

        $ciphertext = $encrypter->decrypt($email);  

        $dataKey = json_decode($ciphertext);

        $data = [
            'dataKey' => $dataKey,
        ];
		return view('auth/inputToken',$data);
	}

	public function kirimEmailToken($email,$token, $token_exp){
		$userModel = new UserModel;
		$user = $userModel->where('email', $email)->first();
		$data = [
            'exp_date' => $token_exp,
            'token' => $token
        ];
        $vw = view('auth/token', $data);
        $this->konfigEmail($user['email'],'Token Login',$vw);
	}

    private function sendAsyncRequest($url)
    {

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => false,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 1,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Cookie: ci_session=d2a85455fb30a393a0468e1279bd453c'
              ),
            ));

            //$response = curl_exec($curl);
            curl_exec($curl);
            curl_close($curl);
            //echo $response;
            //$this->getLog($response);
    }


    public function konfigEmail($to,$subject,$view)
    {
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($view);
        $email->setMailType('html'); // wajib kalau isinya HTML

        if ($email->send()) {
            //echo 'Email berhasil dikirim!';
            $desk = "Email berhasil dikirim ke : ".$to." Subject : ".$subject." Tanggal ".date('Y-m-d H:i:s')."";
        } else {
            $desk = "Gagal mengirim email: ".$to." Subject : ".$subject." Tanggal ".date('Y-m-d H:i:s')." error : ".$email->printDebugger(['headers'])."";
        }

        $this->insertLog($desk);


        // if ($email->send()) {
        //     echo 'Email berhasil dikirim!';
        // } else {
        //     echo 'Gagal mengirim email:<br>';
        //     print_r($email->printDebugger(['headers']));
        // }
    }

	public function form_register(){
		return view('register/bg_form');		

	}
}
