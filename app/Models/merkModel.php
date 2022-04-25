<?php

namespace App\Models;

use CodeIgniter\Model;

class merkModel extends Model
{
  protected $table      = 'tablemerk';
  protected $primaryKey = 'idMerk';
  protected $allowedFields = ['namaMerk'];
}
