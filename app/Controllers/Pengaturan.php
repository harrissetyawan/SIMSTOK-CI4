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
}
