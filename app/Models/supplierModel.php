<?php

namespace App\Models;

use CodeIgniter\Model;

class supplierModel extends Model
{
  protected $table      = 'tablesupp';
  protected $primaryKey = 'idSupp';
  protected $allowedFields = ['namaSupp', 'alamatSupp', 'noTelpSupp', 'Keterangan'];
}
