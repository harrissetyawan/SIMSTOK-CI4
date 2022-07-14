<?php

namespace App\Models;

use CodeIgniter\Model;

class barangMasukModel extends Model
{
  protected $table      = 'tablebrgmasuk';
  protected $primaryKey = 'idBrgMasuk';
  protected $allowedFields = ['namaUnit', 'keterangan'];
  // METHODS

  function barangBySupp($namaSupp)
  {
    $supp = $namaSupp;
    $data =  $this->db->query("SELECT * FROM tablebarang WHERE supplier='$supp'");
    $result = $data->getResultObject();
    return $result;
  }
}
