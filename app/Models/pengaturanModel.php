<?php

namespace App\Models;

use CodeIgniter\Model;

class pengaturanModel extends Model
{
  protected $table      = 'tableprofil';
  protected $primaryKey = 'idProfil';
  protected $allowedFields = ['namaProfil', 'alamatProfil', 'noHP', 'noWA', 'switchWA', 'switchSMS'];
}
