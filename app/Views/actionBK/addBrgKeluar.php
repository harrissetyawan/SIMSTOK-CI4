<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;">
  <section class="mt-4" style="width: 1180.327px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col" style="height: 204.123px;">
          <div class="card shadow">
            <div class="card-header justify-content-between py-2">
              <p class="lead text-info m-0">TAMBAH BARANG KELUAR</p>
              <label></label>
              <form method="POST" action="/saveBK">
                <div class="input-group date">
                  <input placeholder="Masukan Tanggal" type="text" class="form-control col-sm-2 datepicker" id="datepicker" name="tglBarangKeluar">
                </div>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="selectOptNamaBrg">Nama Barang</label>
                  <select name="selectOptNamaBrg" class="form-control selectpicker" data-live-search="true" id="selectOptNamaBrg">
                    <?php
                    foreach ($barang as $key => $value) : ?>
                      <option data-nama="<?= $value['namaBarang']; ?>" data-stok="<?= $value['stok']; ?>" data-unit="<?= $value['unit']; ?>" data-supp="<?= $value['supplier']; ?>" data-tokens="<?= $value['namaBarang'] ?>" value="<?= $value['namaBarang'] ?>"><?= $value['namaBarang'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <input type="hidden" name="nama">
                <div class="form-group col-md-4">
                  <label for="inputSupplier">Supplier</label>
                  <input type="text" class="form-control" id="inputSupplier" name="inputSupplier" readonly>
                </div>
                <div class="form-group col-md-1">
                  <label for="inputStok">STOK</label>
                  <input name="inputStok" type="text" class="form-control" id="inputStok" placeholder="" readonly>
                </div>
                <div class="form-group col-md-1">
                  <label for="inputUnit">UNIT</label>
                  <input name="inputUnit" type="text" class="form-control" id="inputUnit" placeholder="" readonly>
                </div>
                <div class="form-group col-md-1">
                  <label for="inputJumlahBrg">Jumlah</label>
                  <input name="inputJumlahBrg" type="number" class="form-control" id="inputJumlahBrg" placeholder="">
                </div>
                <div class="form-group col-md-1" style="text-align: center;">
                  <label class="" for=""><i class="fa fa-plus"></i></label>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- MODAL SUPP -->
<?= $this->endSection(); ?>