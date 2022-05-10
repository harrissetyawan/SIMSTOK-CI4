<?php

namespace App\Controllers;

use App\Models\barangModel;

class Messages extends BaseController
{
 protected $barangModel;
 public function __construct()
 {
  $this->barangModel = new barangModel();
 }
 public function index()
 {
  $data['title'] = 'Unit & Kategori';
  $data['uri'] = service('uri');
  return view('layout/unitkategori', $data);
 }
 public function checkStok()
 {
  $barang = $this->barangModel->oosBarang();
  dd($barang);
 }
}
