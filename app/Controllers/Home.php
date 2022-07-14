<?php

namespace App\Controllers;

use App\Models\barangModel;
use App\Models\supplierModel;
use App\Models\kategoriModel;
use App\Models\unitModel;
use App\Models\merkModel;
use App\Models\pengaturanModel;

class Home extends BaseController
{
    protected $barangModel;
    protected $merkModel;
    protected $pengaturanModel;
    public function __construct()
    {
        $this->barangModel = new barangModel();
        $this->supplierModel = new supplierModel();
        $this->kategoriModel = new kategoriModel();
        $this->unitModel = new unitModel();
        $this->merkModel = new merkModel();
        $this->pengaturanModel = new pengaturanModel();
    }
    public function index()
    {
        helper('number');
        $data['uri'] = service('uri');
        $data['merk'] = $this->merkModel->findAll();
        $data['unit'] = $this->unitModel->findAll();
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['supplier'] = $this->supplierModel->findAll();
        $data['barang'] = $this->barangModel->paginate('15', 'tablebarang');
        $data['pager'] = $this->barangModel->pager;
        $data['title'] = 'Barang';
        return view('layout/barang', $data);
        // dd($data['kategori']);
        // dd(number_to_currency(2000000, 'IDR', 'id_ID', 0));
    }

    public function save()
    {
        $getHarga = $this->request->getVar('inputHarga');
        $harga = preg_filter('/[^\d.\.]|(?<!\d)\./', '', $getHarga);

        $this->barangModel->save([
            'namaBarang' => $this->request->getVar('inputNamaBarang'),
            'harga' => $harga,
            'supplier' => $this->request->getVar('selectOptSupplier'),
            'merk' => $this->request->getVar('selectOptMerk'),
            'unit' => $this->request->getVar('selectOptUnit'),
            'kategori' => $this->request->getVar('selectOptKat'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'stok' => $this->request->getVar('inputStokAwal')
        ]);
        return redirect()->to(route_to('/'));
    }
    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to(site_url());
    }
    public function fetchDataUpdate($id)
    {
        // $obj = $this->barangModel->getUpdate($id);
        // $data['barang'] = json_decode(json_encode($obj), true);
        $data['merk'] = $this->merkModel->findAll();
        $data['unit'] = $this->unitModel->findAll();
        $data['barang'] = $this->barangModel->find($id);
        $data['title'] = 'Ubah Data';
        $data['uri'] = service('uri');
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['supplier'] = $this->supplierModel->findAll();

        // return redirect()->to(site_url());
        return view('layout/edit', $data);

        // dd($data['kategori'][0]['namaKategori']);
    }
    public function updateData($id)
    {
        if ($this->request->getVar('inputStokAwal') < 5) {
            $this->barangModel->update($id, [
                // 'id' => $this->request->getVar($id),
                'namaBarang' => $this->request->getVar('inputNamaBarang'),
                'harga' => $this->request->getVar('inputHarga'),
                'supplier' => $this->request->getVar('selectOptSupp'),
                'merk' => $this->request->getVar('selectOptMerk'),
                'unit' => $this->request->getVar('selectOptUnit'),
                'kategori' => $this->request->getVar('selectOptKat'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'stok' => $this->request->getVar('inputStokAwal')
            ]);
            // Update Data, Send Notif & Back Home!
            $this->checkAndSend($id);
            return redirect()->to(site_url());
        } else {
            $this->barangModel->update($id, [
                // 'id' => $this->request->getVar($id),
                'namaBarang' => $this->request->getVar('inputNamaBarang'),
                'harga' => $this->request->getVar('inputHarga'),
                'supplier' => $this->request->getVar('selectOptSupp'),
                'merk' => $this->request->getVar('selectOptMerk'),
                'unit' => $this->request->getVar('selectOptUnit'),
                'kategori' => $this->request->getVar('selectOptKat'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'stok' => $this->request->getVar('inputStokAwal')
            ]);
            // Update Data & Back Home!
            return redirect()->to(site_url());
        }
    }
    public function saveMerk()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            $this->merkModel->save([
                'namaMerk' => $this->request->getVar('merkValue')
            ]);
            $data = $this->merkModel->findAll();
            echo json_encode($data);
        }
    }
    public function gs()
    {
        $switch = $this->pengaturanModel->find(2);
        dd($switch);
    }
}
