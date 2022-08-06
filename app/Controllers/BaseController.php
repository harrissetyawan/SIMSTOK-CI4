<?php

namespace App\Controllers;

use App\Models\barangKeluarModel;
use App\Models\barangModel;
use App\Models\pengaturanModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
  protected $pengaturanModel;
  public function __construct()
  {
    $this->pengaturanModel = new pengaturanModel();
    $this->barangModel = new barangModel();
    $this->barangKeluarModel = new barangKeluarModel();
  }

  /* CHECK STOK DEFINE STOK FROM TABLE BARANG */
  public function checkAndSendBK($id)
  {
    $idBK = $this->barangKeluarModel->find($id);
    $barang = $this->barangModel->where('namaBarang', $idBK['namaBarang'])->first();
    $switch = $this->pengaturanModel->find(2);


    foreach ($switch as $kolom => $value) {
      switch ($kolom) {
        case 'switchWA':
          if ($value == "true") {

            $userkey = 'abf6ee3baf8f';
            $passkey = 'c39570dafb3ed9efa26002b1';
            $telepon = $switch['noWA'];
            $message = 'Halo, stok barang ' . $barang['namaBarang'] . ' tersisa ' . $barang['stok'] . ' ' . $barang['unit'] . ' segera lakukan pemesanan!';
            $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
              'userkey' => $userkey,
              'passkey' => $passkey,
              'to' => $telepon,
              'message' => $message
            ));
            $results = json_decode(curl_exec($curlHandle), true);
            curl_close($curlHandle);
          }
          break;
        case 'switchSMS':
          if ($value == 'true') {
            $teleponSMS = $switch['noHP'];
            $messageSMS = 'Halo, stok barang ' . $barang['namaBarang'] . ' tersisa ' . $barang['stok'] . ' ' . $barang['unit'] . ' segera lakukan pemesanan!';
            $token = '482e5dc10b6900f3351c4df77c6013cf';
            $urlSMS = 'https://websms.co.id/api/smsgateway?token=' . $token . '&to=' . $teleponSMS . '&msg=' . $messageSMS . '';
            $header = array(
              'Accept: application/json',
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlSMS);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

            $result = curl_exec($ch);
          }
          break;
      }
    }
  }
  /* CHECK STOK DEFINE STOK FROM TABLE BARANG */
  public function checkAndSend($id)
  {
    $barang = $this->barangModel->find($id);
    $switch = $this->pengaturanModel->find(2);

    foreach ($switch as $key => $value) {
      switch ($key) {
        case 'switchWA':
          if ($value == "true") {
            //CONFIG API
            $userkey = 'abf6ee3baf8f';
            $passkey = 'c39570dafb3ed9efa26002b1';
            $telepon = $switch['noWA'];
            $message = 'Halo, stok barang ' . $barang['namaBarang'] . ' tersisa ' . $barang['stok'] . ' ' . $barang['unit'] . ' segera lakukan pemesanan!';
            $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
              'userkey' => $userkey,
              'passkey' => $passkey,
              'to' => $telepon,
              'message' => $message
            ));
            $results = json_decode(curl_exec($curlHandle), true);
            curl_close($curlHandle);
          }
          break;
        case 'switchSMS':
          if ($value == 'true') {
            $teleponSMS = $switch['noHP'];
            $messageSMS = 'Halo, stok barang ' . $barang['namaBarang'] . ' tersisa ' . $barang['stok'] . ' ' . $barang['unit'] . ' segera lakukan pemesanan!';
            $token = '482e5dc10b6900f3351c4df77c6013cf';
            $urlSMS = 'https://websms.co.id/api/smsgateway?token=' . $token . '&to=' . $teleponSMS . '&msg=' . $messageSMS . '';
            $header = array(
              'Accept: application/json',
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlSMS);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

            $result = curl_exec($ch);
            echo $result;
          }
          break;
      }
    }
  }
  /* SEND OTP */

  /**
   * Instance of the main Request object.
   *
   * @var CLIRequest|IncomingRequest
   */
  protected $request;

  /**
   * An array of helpers to be loaded automatically upon
   * class instantiation. These helpers will be available
   * to all other controllers that extend BaseController.
   *
   * @var array
   */
  protected $helpers = ['url'];

  /**
   * Constructor.
   */
  public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
  {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);

    // Preload any models, libraries, etc, here.

    // E.g.: $this->session = \Config\Services::session();
  }
}
