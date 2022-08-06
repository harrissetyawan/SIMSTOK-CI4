<?php

namespace App\Controllers;

use App\Models\barangKeluarModel;
use App\Models\barangModel;
use App\Models\pengaturanModel;

class BarangKeluar extends BaseController
{
	protected $barangKeluarModel;
	protected $barangModel;
	protected $pengaturanModel;
	public function __construct()
	{
		$this->barangKeluarModel = new barangKeluarModel();
		$this->barangModel = new barangModel();
		$this->pengaturanModel = new pengaturanModel();
	}
	public function index()
	{
		$data['title'] = 'Barang Keluar';
		$data['uri'] = service('uri');
		$data['brgKeluar'] = $this->barangKeluarModel->paginate('15', 'tablebrgkeluar');
		$data['pager'] = $this->barangKeluarModel->pager;

		return view('layout/barangkeluar', $data);
	}
	public function formAdd()
	{
		$data['title'] = 'FORM ADD BARANG';
		$data['uri'] = service('uri');
		$obj = $this->barangModel->findAll();
		$data['barang'] = json_decode(json_encode($obj), true);
		return view('/actionBK/addBrgKeluar', $data);
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
		$id = $this->barangKeluarModel->getInsertID();
		$this->checkAndSendBK($id);
		return redirect()->to(base_url('/barangkeluar'));
	}
	public function delete($id)
	{
		$this->barangKeluarModel->delete($id);
		return redirect()->to(base_url('/barangkeluar'));
	}
	public function test()
	{
		$s = $this->barangKeluarModel->find(50);
		$stokBK = $this->barangModel->where('namaBarang', $s['namaBarang'])->first();
		dd($stokBK);
	}
}
