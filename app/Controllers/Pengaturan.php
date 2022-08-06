<?php

namespace App\Controllers;

use App\Models\pengaturanModel;
use Psr\Log\Test\DummyTest;

class Pengaturan extends BaseController
{
  protected $pengaturanModel;
  public function __construct()
  {
    $this->pengaturanModel = new pengaturanModel();
  }
  public function index()
  {
    $data['profil'] = $this->pengaturanModel->where('idProfil', '2')->first();
    $data['title'] = 'Pengaturan';
    $data['uri'] = service('uri');
    return view('layout/pengaturan', $data);
    // dd($data['profil']);
  }
  public function updSet($id)
  {
    if ($this->request->getVar('switchWA')  == true) {
      $switchWA = "true";
    } else {
      $switchWA = "false";
    }
    if ($this->request->getVar('switchSMS')  == true) {
      $switchSMS = "true";
    } else {
      $switchSMS = "false";
    }
    $this->pengaturanModel->update($id, [
      'namaProfil' => $this->request->getVar('inputNamaToko'),
      'alamatProfil' => $this->request->getVar('alamat'),
      'noWA' => $this->request->getVar('inputNoWA'),
      'noHP' => $this->request->getVar('inputSMS'),
      'switchWA' => $switchWA,
      'switchSMS' => $switchSMS
    ]);
    return redirect()->to(base_url('/pengaturan'));
    // dd($this->request->getVar(), $switchWA, $switchSMS);
  }
  public function gs()
  {
    $switch = $this->pengaturanModel->find(2);
    print_r($switch);
  }
}
