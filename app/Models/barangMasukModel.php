<?php

namespace App\Models;

use CodeIgniter\Model;

class barangMasukModel extends Model
{
  protected $table      = 'tablebrgmasuk';
  protected $primaryKey = 'idBrgMasuk';
  protected $allowedFields = ['namaBarang', 'jumlahBarang', 'unit', 'namaSupp', 'tanggalMasuk'];

  // METHODs

  function barangBySupp($namaSupp)
  {
    $supp = $namaSupp;
    $data =  $this->db->query("SELECT * FROM tablebarang WHERE supplier='$supp'");
    $result = $data->getResultObject();
    return $result;
  }
  public function fetchModelBM($id)
  {
    # code...
    $data = $this->db->query("SELECT * FROM tablebrgmasuk WHERE idBrgMasuk='$id'")->getResultObject();
    return $data;
  }
}
