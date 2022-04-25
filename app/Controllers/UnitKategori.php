<?php

namespace App\Controllers;

use App\Models\kategoriModel;
use App\Models\merkModel;
use App\Models\unitModel;

class UnitKategori extends BaseController
{
  protected $kategoriModel;
  protected $unitModel;
  protected $merkModel;
  public function __construct()
  {
    $this->kategoriModel = new kategoriModel();
    $this->unitModel = new unitModel();
    $this->merkModel = new merkModel();
  }
  public function index()
  {
    $data['title'] = 'Unit & Kategori';
    $data['uri'] = service('uri');
    $data['unit'] = $this->unitModel->paginate(7, 'tableunit');
    $data['pager'] = $this->unitModel->pager;
    $data['kategori'] = $this->kategoriModel->paginate(7, 'tablekategori');
    $data['pagerKat'] = $this->kategoriModel->pager;
    $data['merk'] = $this->merkModel->paginate(7, 'tablemerk');
    $data['pagermerk'] = $this->merkModel->pager;

    return view('layout/unitkategori', $data);
  }
  // FETCH DATA UTK UPDATE
  public function fetchKat($id)
  {
    $data['kategori'] = $this->kategoriModel->find($id);
    $data['title'] = 'Ubah Data';
    $data['uri'] = service('uri');

    return view('/actionUK/editKat', $data);
  }
  public function fetchMerk($id)
  {
    $data['merk'] = $this->merkModel->find($id);
    $data['title'] = 'Ubah Data';
    $data['uri'] = service('uri');

    return view('/actionUK/editMerk', $data);
  }
  public function fetchUnit($id)
  {
    $data['unit'] = $this->unitModel->find($id);
    $data['title'] = 'Ubah Data';
    $data['uri'] = service('uri');

    return view('/actionUK/editUnit', $data);
  }

  // METHOD UTK UNIT
  public function saveUnit()
  {
    $this->unitModel->save([
      'namaUnit' => $this->request->getVar('inputNamaUnit'),
      'keterangan' => $this->request->getVar('deskripsi')
    ]);
    return redirect()->to(base_url('unitkategori'));
  }

  public function deleteUnit($id)
  {
    $this->unitModel->delete($id);
    return redirect()->to(base_url('unitkategori'));
  }

  //METHOD UTK KATEGORI
  public function saveData()
  {
    if ($this->request->getVar('inputNamaKat') !== '') {
      $this->kategoriModel->save([
        'namaKategori' => $this->request->getVar('inputNamaKat'),
        'Keterangan' => $this->request->getVar('deskripsiKat')
      ]);
      return redirect()->to(base_url('unitkategori'));
    }
    if ($this->request->getVar('inputNamaUnit') !== '') {
      $this->unitModel->save([
        'namaUnit' => $this->request->getVar('inputNamaUnit'),
        'keterangan' => $this->request->getVar('deskripsiUnit')
      ]);
      return redirect()->to(base_url('unitkategori'));
    }
    if ($this->request->getVar('inputNamaMerk') !== '') {
      $this->merkModel->save([
        'namaMerk' => $this->request->getVar('inputNamaMerk')
      ]);
      return redirect()->to(base_url('unitkategori'));
    }
  }

  public function updateKat($id)
  {
    $this->kategoriModel->update($id, [
      'namaKategori' => $this->request->getVar('inputNamaKat'),
      'Keterangan' => $this->request->getVar('deskripsi')
    ]);
    return redirect()->to(base_url('/unitkategori'));
  }

  public function updateUnit($id)
  {
    $this->unitModel->update($id, [
      'namaUnit' => $this->request->getVar('inputNamaUnit'),
      'keterangan' => $this->request->getVar('deskUnit')
    ]);
    return redirect()->to(base_url('/unitkategori'));
  }
  public function deleteKategori($id)
  {
    $this->kategoriModel->delete($id);
    return redirect()->to(base_url('unitkategori'));
  }
  public function deleteMerk($id)
  {
    $this->merkModel->delete($id);
    return redirect()->to(base_url('unitkategori'));
  }
}
