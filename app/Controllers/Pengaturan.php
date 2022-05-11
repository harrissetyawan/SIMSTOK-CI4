<?php

namespace App\Controllers;

use App\Models\pengaturanModel;

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
  public function update($id)
  {
    // $this->pengaturanModel->save($id, [
    //   'namaProfil' => $this->request->getVar('inputNamaToko'),
    //   'alamatProfil' => $this->request->getVar('alamat'),
    //   'noWA' => $this->request->getVar('inputNoWA'),
    //   'noHP' => $this->request->getVar('inputSMS'),
    //   'switchWA' => $this->request->getVar('switchWA'),
    //   'switchSMS' => $this->request->getVar('switchSMS')
    // ]);
    // return redirect()->to(base_url('/pengaturan'));
    dd($this->request->getVar());
  }
}
