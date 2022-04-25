<?php

namespace App\Models;

use CodeIgniter\Model;

class barangKeluarModel extends Model
{
  protected $table      = 'tablebrgkeluar';
  protected $primaryKey = 'idBrgKeluar';
  protected $returnType = 'array';
  protected $allowedFields = ['namaBarang', 'jumlahBarang', 'namaUnit', 'namaSupp', 'tglBrgKeluar'];
  // METHODS
  // public function formBK()
  // {
  //   $builder = $this->db->table('tablebrgkeluar');
  //   $builder->join('taablebarang', 'tablebarang.namaBarang = tablebarang.supplier')
  //     ->join('tablekategori', 'tablekategori.idKategori = tablebarang.kategori')
  //     ->join('tableunit', 'tableunit.idUnit = tablebarang.unit')
  //     ->join('tablemerk', 'tablemerk.idMerk = tablebarang.merk')
  //     ->get()->getResultArray();
  // }
  public function autoInput($name)
  {

    $query = $this->db->query("SELECT * FROM tablebrgmasuk WHERE namaBarang = '$name'");
    foreach ($query->getResultArray() as $data) {
      $q = array(
        'namaBarang' => $data->namaBarang,
        'namaSupp' => $data->namaSupp,
        'jumlahBarang' => $data->jumlahBarang,
        'unit' => $data->unit,
      );
    }
    return $q;
  }
}
