<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;
use App\Libraries\MyEncrypter;
use Mailjet\Client;
use Mailjet\Resources;


class Auth extends BaseController
{

  public function insertLog($desk)
  {
    $logModel = new LogModel();
    $dataLog = [
      'description'   => $desk,
      'create_date'   => date('Y-m-d H:i:s'),
      'create_user'   => $this->session->get('nama')
    ];

    $logModel->insert($dataLog);
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

  public function form_forget_password()
  {

    return view('auth/bg_lupa_password');
  }

  public function cekLogin()
  {
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new UserModel;
    $user = $userModel->where('email', $email)->where('flag !=', 3)->first();

    $token = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);


    if ($user) {
      if ($user && password_verify($password, $user['password'])) {
        if ($user['flag_active'] == 2) {
          $respMessage = "Akun deactivated !";
          $respCode = "99";
          $rsp = '';
        } else {
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

          $this->sendAsyncRequest($this->kirimEmailToken($email, $token, $now->format('Y-m-d H:i:s')));
        }
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
      'respMessage' => $respMessage,
      'rsp' => $rsp
    ]);

    $desk = "Login akses email : " . $email . " dengan response : " . $resp . "";

    return $resp;
  }

  public function cekEmail()
  {
    $encrypter = new MyEncrypter();
    $userModel = new UserModel;
    $email = $this->request->getPost('email');
    $user = $userModel->where('email', $email)->where('flag !=', 3)->first();

    $now = new \DateTime();
    $now->modify('+1 hour');
    if ($user) {
      $dataGenerate = json_encode([
        'id' => $user['id'],
        'fullname' => $user['nama_lengkap'],
        'email'    => $user['email'],
        'generateDate' => date('Y-m-d H:i:s'),
      ]);
      $ciphertext = $encrypter->encrypt($dataGenerate);

      $this->sendAsyncRequest($this->kirimEmailLupaPassword($email, $ciphertext, $now->format('Y-m-d H:i:s')));

      $respMessage = "Sukses";
      $respCode = "0";
      $rsp = $ciphertext;
    } else {
      $respMessage = "Email tidak ditemukan";
      $respCode = "99";
      $rsp = '';
    }

    $resp =  json_encode([
      'respCode' => $respCode,
      'respMessage' => $respMessage,
      'rsp' => $rsp
    ]);

    return $resp;
  }

  public function lupa_password_sukses()
  {
    $encrypter = new MyEncrypter();

    $token = $this->request->getGet('account');
    $token = str_replace(' ', '+', $token);

    $ciphertext = $encrypter->decrypt($token);


    $dataKey = json_decode($ciphertext);
    $data = [
      'dataKey' => $dataKey,
    ];

    return view('auth/bg_lupa_password_success', $data);
  }


  public function logout()
  {
    // remove session
    session()->destroy();

    return redirect()->to('/')->with('msg', '<div class="alert alert-info">Logout berhasil.</div>');
  }

  public function register()
  {

    return view('register/bg_register');
  }

  public function resendTokenLogin()
  {
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
    $this->sendAsyncRequest($this->kirimEmailToken($email, $token, $now->format('Y-m-d H:i:s')));
  }

  public function verifikasiTokenLogin()
  {
    $userModel = new UserModel;
    $token = $this->request->getPost('token');
    $email = $this->request->getPost('email');
    $datNow = date('Y-m-d H:i:s');
    $user = $userModel->where('email', $email)->first();

    if ($token != $user['token']) {
      $respCode = 1;
      $respMessage = "Token yang Anda masukkan salah. Silakan periksa kembali atau minta token baru.";
    } elseif ($user['token_expired'] < $datNow) {
      $respCode = 1;
      $respMessage = "Token expired ! silakan minta token baru.";
    } else {
      $respCode = 0;
      $respMessage = "Login Sukses";

      session()->set([
        'id' => $user['id'],
        'email' => $user['email'],
        'nama_lengkap' => $user['nama_lengkap'],
        'nama_panggilan' => $user['nama_panggilan'],
        'domisili' => $user['domisili'],
        'logged_in' => true,
        'nomor_anggota' => $user['nomor_anggota'],
        'profesi' => $user['profesi'],
      ]);
    }

    $resp =  json_encode([
      'respCode' => $respCode,
      'respMessage' => $respMessage
    ]);

    return $resp;
  }



  public function form_token_login()
  {
    $encrypter = new MyEncrypter();

    $email = $this->request->getGet('rsp');
    $email = str_replace(' ', '+', $email);

    $ciphertext = $encrypter->decrypt($email);

    $dataKey = json_decode($ciphertext);

    $data = [
      'dataKey' => $dataKey,
    ];
    return view('auth/inputToken', $data);
  }

  public function kirimEmailToken($email, $token, $token_exp)
  {
    $userModel = new UserModel;
    $user = $userModel->where('email', $email)->first();
    $data = [
      'exp_date' => $token_exp,
      'token' => $token
    ];
    $vw = view('auth/token', $data);
    $this->konfigEmail($user['email'], $user['nama_lengkap'],'Token Login', $vw);
  }

  public function kirimEmailLupaPassword($email, $chiper, $token_exp)
  {
    $userModel = new UserModel;
    $user = $userModel->where('email', $email)->first();
    $data = [
      'email'   => $user['email'],
      'nama_lengkap'   => $user['nama_lengkap'],
      'exp_date' => $token_exp,
      'ciphertext' => $chiper
    ];
    $vw = view('auth/bg_email_lupa_password', $data);
    $this->konfigEmail($user['email'],$user['nama_lengkap'], 'Verifikasi Lupa Password', $vw);
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

    curl_exec($curl);
    curl_close($curl);
  }


  public function konfigEmail($toEmail, $toName, $subject, $view)
  {
    $apiKey = "ef002126f3ce08d048586f718b4cddd0";
    $apiSecret = "5bdfc6bd0cd33414c685c94b6c98567a";

    $mj = new Client($apiKey, $apiSecret, true, ['version' => 'v3.1']);

    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "tech@sindikasi.org",
            'Name' => "Admin Sindikasi"
          ],
          'To' => [
            [
              'Email' => $toEmail,
              'Name' => $toName
            ]
          ],
          'Subject' => $subject,
          'TextPart' => "Hi, Sindikasi Member",
          'HTMLPart' => $view
        ]
      ]
    ];

    $response = $mj->post(Resources::$Email, ['body' => $body]);

    if ($response->success()) {
      $desk = "Email berhasil dikirim ke : " . $toEmail . " Subject : " . $subject . " Tanggal " . date('Y-m-d H:i:s') . "";
    } else {
      $desk = "Gagal mengirim email: " . $toEmail . " Subject : " . $subject . " Tanggal " . date('Y-m-d H:i:s') . " error : " . $email->printDebugger(['headers']) . "";
    }

    $this->insertLog($desk);
  }

  public function form_register()
  {
    return view('register/bg_form');
  }
}
