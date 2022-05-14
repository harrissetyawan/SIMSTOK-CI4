<?php

namespace App\Controllers;

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
  }
  /* CHECK STOK */
  public function checkAndSend($id)
  {
    # variabels...
    $barang = $this->barangModel->where('id', $id);
    $switch = $this->pengaturanModel->find(2);

    if ($barang->stok < 5) {
      foreach ($switch as $key => $value) {
        # code...
        switch ($key) {
          case 'switchWA':
            if ($value == "true") {
              d("WA MASUK");
            }
            break;
          case 'switchSMS':
            if ($value == "true") {
              d("WA");
            }
            break;
        }
      }
    }
  }
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
