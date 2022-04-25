<?php

namespace App\Controllers;

use App\Models\supplierModel;

class Supplier extends BaseController
{
	protected $supplierModel;
	public function __construct()
	{
		$this->supplierModel = new supplierModel();
	}
	public function index()
	{
		$data['title'] = 'Supplier';
		$data['uri'] = service('uri');
		$data['supplier'] = $this->supplierModel->paginate(8, 'tablesupp');
		$data['pager'] = $this->supplierModel->pager;
		return view('layout/supplier', $data);
		// dd($data['supplier']);
	}
	public function save()
	{
		$this->supplierModel->save([
			'namaSupp' => $this->request->getVar('inputNamaSupp'),
			'alamatSupp' => $this->request->getVar('inputAlamatSupp'),
			'noTelpSupp' => $this->request->getVar('inputNoTelpSupp'),
			'Keterangan' => $this->request->getVar('deskripsi')
		]);
		return redirect()->to(base_url('/supplier'));
	}

	public function delete($id)
	{
		$this->supplierModel->delete($id);
		return redirect()->to(base_url('/supplier'));
	}

	public function fetchDataUpdate($id)
	{
		$data['supplier'] = $this->supplierModel->find($id);
		$data['title'] = 'Ubah Data Supplier';
		$data['uri'] = service('uri');

		return view('layout/editSupp', $data);

		// dd($data['supplier']);
	}
	public function updateData($id)
	{
		$this->supplierModel->update($id, [
			'namaSupp' => $this->request->getVar('inputNamaSupp'),
			'alamatSupp' => $this->request->getVar('InputAlamatSupp'),
			'noTelpSupp' => $this->request->getVar('inputNoTelpSupp'),
			'Keterangan' => $this->request->getVar('deskripsi')
		]);
		return redirect()->to('/supplier');
		// dd($this->request->getVar('selectOptSupp'));
	}
}
