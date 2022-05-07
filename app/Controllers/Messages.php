<?php

namespace App\Controllers;

class Messages extends BaseController
{
 public function index()
 {
  $data['title'] = 'Unit & Kategori';
  $data['uri'] = service('uri');
  return view('layout/unitkategori', $data);
 }
 public function checkBarang()
 {
 }
}
