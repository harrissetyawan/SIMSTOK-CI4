<?php

namespace App\Models;

use CodeIgniter\Model;

class barangModel extends Model
{
  protected $table      = 'tablebarang';
  protected $primaryKey = 'id';
  protected $allowedFields = ['namaBarang', 'harga', 'supplier', 'merk', 'unit', 'kategori', 'deskripsi', 'stok'];

  function getAll()
  {
    $builder = $this->db->table('tablebarang');
    $builder->join('tablesupp', 'tablesupp.idSupp = tablebarang.supplier')
      ->join('tablekategori', 'tablekategori.idKategori = tablebarang.kategori')
      ->join('tableunit', 'tableunit.idUnit = tablebarang.unit')
      ->join('tablemerk', 'tablemerk.idMerk = tablebarang.merk')
      ->get()->getResultArray();
  }
  function getUpdate($id)
  {
    $builder = $this->table('tablebarang')->where('id', $id);
    $builder->join('tablesupp', 'tablesupp.idSupp = tablebarang.supplier')
      ->join('tablekategori', 'tablekategori.idKategori = tablebarang.kategori')
      ->join('tableunit', 'tableunit.idUnit = tablebarang.unit')
      ->join('tablemerk', 'tablemerk.idMerk = tablebarang.merk');
    $query = $builder->get();
    return $query->getRow();
  }
  function oosBarang()
  {
    $builder = $this->table('tablebarang')->where('stok <', 5);
    $query = $builder->get();
    return $query->getResultArray();
  }
}
