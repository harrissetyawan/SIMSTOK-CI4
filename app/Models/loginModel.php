<?php

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
 protected $table = 'login';
 protected $primaryKey = 'idLogin';
 protected $allowedFields = ['username', 'password'];
}
