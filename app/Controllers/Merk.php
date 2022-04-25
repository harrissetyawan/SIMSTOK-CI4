<?php

namespace App\Controllers;

class UnitKategori extends BaseController
{
  public function index()
  {
    $data['title'] = 'Unit & Kategori';
    $data['uri'] = service('uri');
    return view('layout/unitkategori', $data);
  }
}
