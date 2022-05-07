<?= $this->extend('layout/actionmain'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;">
  <section class="mt-4" style="width: 1180.327px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col" style="height: 204.123px;">
          <div class="card shadow" id="poContent">
            <div class="card-header justify-content-center pb-1" style="text-align: center;">
              <p class="lead text-info m-0 font-weight-bold">PURCHASE ORDER</p>
              <hr style="margin: 2px;">
              <p class="lead text-info m-0">No. PO00<?= random_string('numeric', 5); ?></p>
            </div>
            <div class="card-body">
              <form method="" action="/BarangMasuk/addBarangMasuk">
                <div class="form-flex">
                  <input placeholder="Masukan Tanggal" type="text" class="form-control form-control-plaintext col-sm-2 datepicker" id="datepicker" name="tglBarangKeluar">
                  <div class="d-flex justify-content-between">
                    <p class="input-group text-left" style="margin-bottom: 0;">INFO TOKO</p>
                    <p class="input-group text-left" style="margin-bottom: 0;">INFO SUPPLIER</p>
                  </div>
                  <div class="separator d-flex justify-content-between">
                    <!-- SECTION INFO TOKO -->
                    <div class="sectionToko" style="width: 50%;">
                      <div class="input-group input-group-lg col-md-5">
                        <input class="form-control form-control-plaintext" type="text" name="inputNamaToko" id="" placeholder="Nama Toko" value="<?= $profil['namaProfil']; ?>" style="padding : 0px;">
                      </div>
                      <div class="input-group col-md-7">
                        <textarea class="form-control form-control-plaintext" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" value=""><?= $profil['alamatProfil']; ?></textarea>
                      </div>
                      <div class="input-group col-md-4">
                        <input class="form-control form-control-plaintext" type="text" name="inputNamaToko" id="" placeholder="Nama Toko" value="<?= $profil['noHP']; ?>" style="padding : 0px;">
                      </div>
                    </div>
                    <!-- SECTION INFO SUPPLIER -->
                    <div class="sectionSupp" style="width: 50%;">
                      <div class="input-group input-group-lg col-md-7">
                        <select id="selectOptSupp" class="form-control selectpicker" data-live-search="true">
                          <?php foreach ($supplier as $value) : ?>
                            <option data-nama="<?= $value['namaSupp']; ?>" data-notelp="<?= $value['noTelpSupp']; ?>" data-alamat="<?= $value['alamatSupp']; ?>" data-tokens="<?= $value['namaSupp'] ?>" name="" value="<?= $value['namaSupp'] ?>"><?= $value['namaSupp'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <input type="hidden" name="namaSupp">
                      <div class="input-group col-md-7">
                        <textarea class="form-control form-control-plaintext bg-white" placeholder="Leave a comment here" id="alamatSupp" name="alamatSupp" readonly style="height: 100px; padding-left:13px;"></textarea>
                      </div>
                      <div class="input-group col-md-7">
                        <input class="form-control form-control-plaintext bg-white" type="text" name="noTelp" id="noTelpSupp" placeholder="No Telp" readonly style="padding-left:13px;">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ISI DENGAN PO GENERATOR -->
                <hr style="margin-bottom: 0px;">
                <form action="<?php echo base_url() . 'admin/add_purchase'; ?>" method="post" class="form-horizontal form-label-left" novalidate>
                  <table id="purchase" class="table table-sm">
                    <thead>
                      <tr>
                        <th style="text-align: left">Nama Barang</th>
                        <th style="text-align: left">Stok</th>
                        <th style="text-align: left">Harga</th>
                        <th style="text-align: left">Unit</th>
                        <th style="text-align: left">Banyak</th>
                        <th style="text-align: center">Subtotal</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <td style="text-align:right; vertical-align: middle" colspan="5"><b>Grandtotal</b></td>
                        <td>
                          <input id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" readonly>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="ln_solid"></div>
                  <div class="form-group delSec">
                    <div class="col-md-6 col-md-offset-3">
                      <a href="<?php echo base_url('admin/table_purchase') ?>">
                        <button type="reset" class="btn btn-danger">Batal</button>
                      </a>
                      <button id='addpurchase' class="btn btn-info" type="button">
                        <span class="fa fa-plus"></span>Tambah Produk</button>
                      <button id="send" onclick="window.print()" class="btn btn-success">
                        Simpan
                      </button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</section>
</div>
<!-- MODAL SUPP -->
<?= $this->endSection(); ?>