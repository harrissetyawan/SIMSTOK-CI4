<?php

namespace App\Models;

use CodeIgniter\Model;

class unitModel extends Model
{
  protected $table      = 'tableunit';
  protected $primaryKey = 'idUnit';
  protected $allowedFields = ['namaUnit', 'keterangan'];
}
