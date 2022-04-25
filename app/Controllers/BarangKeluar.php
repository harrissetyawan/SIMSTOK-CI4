<?php

namespace App\Controllers;

use App\Models\barangKeluarModel;
use App\Models\barangModel;

class BarangKeluar extends BaseController
{
	protected $barangKeluarModel;
	protected $barangModel;
	public function __construct()
	{
		$this->barangKeluarModel = new barangKeluarModel();
		$this->barangModel = new barangModel();
	}
	public function index()
	{
		$data['title'] = 'Barang Keluar';
		$data['uri'] = service('uri');
		$data['brgKeluar'] = $this->barangKeluarModel->findAll();
		return view('layout/barangkeluar', $data);
		// dd($data['brgKeluar']);
	}
	public function formAdd()
	{
		$data['title'] = 'FORM ADD BARANG';
		$data['uri'] = service('uri');
		$obj = $this->barangModel->findAll();
		$data['barang'] = json_decode(json_encode($obj), true);
		return view('/actionBK/addBrgKeluar', $data);
		// dd($data['barang']);
		// dd($obj);
	}
	public function addBarangKeluar()
	{
		$this->barangKeluarModel->save([
			'namaBarang' => $this->request->getVar('nama'),
			'jumlahBarang' => $this->request->getVar('inputJumlahBrg'),
			'namaSupp' => $this->request->getVar('inputSupplier'),
			'namaUnit' => $this->request->getVar('inputUnit'),
			'tglBrgKeluar' => $this->request->getVar('tglBarangKeluar')
		]);
		return redirect()->to(base_url('/barangkeluar'));
		// var_dump($data);
	}
	public function delete($id)
	{
		$this->barangKeluarModel->delete($id);
		return redirect()->to(base_url('/barangkeluar'));
	}
}
