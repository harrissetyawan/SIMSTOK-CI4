<?php

namespace App\Models;

use CodeIgniter\Model;

class kategoriModel extends Model
{
  protected $table      = 'tablekategori';
  protected $primaryKey = 'idKategori';
  protected $allowedFields = ['namaKategori', 'Keterangan'];
}
