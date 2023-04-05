<?php

namespace App\Controllers;

use App\Models\barangMasukModel;
use App\Models\barangModel;
use App\Models\pengaturanModel;
use App\Models\supplierModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\HTTP\IncomingRequest;


class BarangMasuk extends BaseController
{
	protected $barangMasukModel;
	protected $barangModel;
	protected $pengaturanModel;
	protected $supplierModel;
	protected $time;
	protected $request;
	public function __construct()
	{
		$time = new Time('now', 'Asia/Jakarta');
		$this->barangMasukModel = new barangMasukModel();
		$this->barangModel = new barangModel();
		$this->pengaturanModel = new pengaturanModel();
		$this->supplierModel = new supplierModel();
	}
	public function index()
	{
		$data['title'] = 'Barang Masuk';
		$data['uri'] = service('uri');
		$data['brgMasuk'] = $this->barangMasukModel->paginate(10, 'tablebrgmasuk');
		$data['supps'] = $this->supplierModel->findAll();
		$data['barang'] = $this->barangModel->findAll();
		$data['pagerBM'] = $this->barangMasukModel->pager;
		return view('layout/barangmasuk', $data);
	}
	public function formAdd()
	{
		helper('text');
		$data['title'] = 'BUAT PO';
		$data['uri'] = service('uri');
		$data['brgMasuk'] = $this->barangMasukModel->findAll();
		$data['barang'] = $this->post();
		$data['supplier'] = $this->supplierModel->findAll();
		$data['profil'] = $this->pengaturanModel->where('idProfil', '2')->first();
		return view('actionBM/addPOBM', $data);
	}

	public function buatRetur()
	{
		helper('text');
		$data['title'] = 'BUAT PO';
		$data['uri'] = service('uri');
		$data['brgMasuk'] = $this->barangMasukModel->findAll();
		$data['barang'] = $this->post();
		$data['supplier'] = $this->supplierModel->findAll();
		$data['profil'] = $this->pengaturanModel->where('idProfil', '2')->first();
		return view('actionBM/addRetur', $data);
		// dd($data['brgMasuk']);
	}

	public function post()
	{
		$request = service('request');
		if ($request->isAJAX()) {
			$namaSupp = $request->getVar('id');
			$data =  $this->barangMasukModel->barangBySupp($namaSupp);
			echo json_encode($data);
		}
	}
	public function getBarang()
	{
		$request = service('request');
		if ($request->isAJAX()) {
			$barang = $request->getVar('namaBarang');
			$data =  $this->barangModel->where('namaBarang', $barang)->first();
			echo json_encode($data);
		}
	}

	public function delete($id)
	{
		$this->barangMasukModel->delete($id);
		return redirect()->to(base_url('/barangmasuk'));
	}
	public function insertBM()
	{
		$this->barangMasukModel->save([
			'namaBarang' => $this->request->getVar('inputNamaBM'),
			'jumlahBarang' => $this->request->getVar('inputJumlahBM'),
			'unit' => $this->request->getVar('inputUnitBM'),
			'namaSupp' => $this->request->getVar('inputSupplierBM'),
			'tanggalMasuk' => $this->request->getVar('inputTanggalBM'),
		]);
		return redirect()->to(base_url('/barangmasuk'));
	}
	public function fetchUpdateBM()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');
			$data =  $this->barangMasukModel->fetchModelBM($id);
			echo json_encode($data);
		}
	}
	public function updateBM($id)
	{
		$this->barangMasukModel->update($id, [
			'jumlahBarang' => $this->request->getVar('editJumlahBM'),
			'tanggalMasuk' => $this->request->getVar('editTanggalBM')
		]);
		return redirect()->to(base_url('/barangmasuk'));
	}
}
