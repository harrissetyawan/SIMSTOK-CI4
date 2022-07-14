<?php

namespace App\Controllers;

use App\Models\loginModel;
use App\Models\pengaturanModel;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
  public function index()
  {
    $model = new loginModel();
    helper(['form']);
    return view('login');
  }

  public function auth()
  {
    $session = session();
    $model = new loginModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $data = $model->where('username', $username)->first();
    if ($data) {
      $pass = $data['password'];
      $verify_pass = password_verify($password, $pass);
      if ($verify_pass) {
        $ses_data = [
          'user_id' => $data['idLogin'],
          'user_name' => $data['username'],
          'logged_in' => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/');
      } else {
        $session->setFlashdata('msg', 'Wrong Password');
        return redirect()->to('/login');
      }
    } else {
      $session->setFlashdata('msg', 'Username not Found');
      return redirect()->to('/login');
    }
  }

  public function resetRequest()
  {
    helper('text');
    $resetSession = session();
    $loginInfo = new loginModel();
    $userInfo = new pengaturanModel();

    $otp  = random_string('numeric', 5);
    $res_data = [
      'otpcode' => $otp,
      'reset_in' => TRUE,
    ];
    $resetSession->set($res_data);
    // $this->sendOTP($otp);
    $resetSession->start();
    return view('resetform', $res_data);
  }
  // WA API Send OTP
  public function sendOTP($otp)
  {
    // Variables
    $otpSession = session();
    $noWA = $this->pengaturanModel->find(2);
    // // SEND PROCESS
    // $userkey = 'abf6ee3baf8f';
    // $passkey = 'c39570dafb3ed9efa26002b1';
    // $telepon = $noWA['noWA'];
    // $message = 'Kode OTP Untuk Reset adalah ' . $otp . '';
    // $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
    // $curlHandle = curl_init();
    // curl_setopt($curlHandle, CURLOPT_URL, $url);
    // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
    // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
    // curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
    // curl_setopt($curlHandle, CURLOPT_POST, 1);
    // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    //   'userkey' => $userkey,
    //   'passkey' => $passkey,
    //   'to' => $telepon,
    //   'message' => $message
    // ));
    // $results = json_decode(curl_exec($curlHandle), true);
    // curl_close($curlHandle);

  }
  public function checkOTP()
  {
    $otpInput = $this->request->getVar('otpInput');
    $otpSession = session();
    if ($otpInput == $otpSession->get('otpcode')) {

      print_r($otpInput, $otpSession->get('otpcode'));
      $otpSession->destroy();
      return view('reset');
    } else {
      echo '<script>
      alert("Kode OTP Salah! Coba Lagi");
      </script>';
      $otpSession->destroy();
      return view('login');
    }
  }
  public function UpdateUserCredentials()
  {
    $loginModel = new loginModel();
    $newPass = $this->request->getVar('username');
    $loginModel->update(2, [
      'username' => $this->request->getVar('username'),
      'password' => password_hash($newPass, PASSWORD_DEFAULT)
    ]);
    return redirect()->to('/');
  }
  public function Logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }
}
