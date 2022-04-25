<?= $this->extend('layout/actionmain'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;">
  <section class="mt-4" style="width: 1180.327px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col" style="height: 204.123px;">
          <div class="card shadow">
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
                <div class="card-body">
                  <div id="contentRow">
                    <div class="form-row" id="form0">
                      <div class="form-group">

                      </div>
                      <div class="form-group col-sm-4">
                        <label for="selBarang">Nama Barang</label>
                        <select id="selBarang" name="selBarang[0]" class="form-control form-control-sm selectpicker" data-live-search="true">

                        </select>
                      </div>
                      <div class="form-group col-sm-2">
                        <label for="inputHarga">Harga</label>
                        <input type="text" class="form-control form-control-sm" id="inputHarga" readonly>
                      </div>
                      <div class="form-group col-md-1 mr-0">
                        <label for="inputJumlahBrg">Jumlah</label>
                        <input id="inputJumlahBrg" type="number" class="form-control form-control-sm">
                      </div>
                      <div class="form-group col-md-1">
                        <label for="inputUnit">Unit</label>
                        <input type="text" class="form-control form-control-sm" id="inputUnit" readonly>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputMerk">Merk</label>
                        <input type="text" class="form-control form-control-sm" id="inputMerk" readonly>
                      </div>
                      <div class="form-group col-md-2 ">
                        <label for="SubTotal">Sub Total</label>
                        <input type="text" class="form-control form-control-sm" id="SubTotal" readonly>
                      </div>
                    </div>
                  </div>
              </form>
              <div class="form-group col-md-1" style="padding-left: 0px;">
                <button type="button" id="addRow" class="btn shadow btn-warning"><i class="fa fa-plus" style="color: aliceblue;"></i></button>
              </div>
              <div class="form-row justify-content-end">
                <div class="form-group row col-md-3">
                  <label for="grandTotal" class="pr-2">TOTAL</label>
                  <input name="grandTotal" type="text" class="form-control col-md-9 bg-dark text-warning" id="grandTotal" readonly>
                </div>
              </div>
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