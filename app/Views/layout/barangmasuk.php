<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: -1px; width: 100%;">
  <section class="mt-4" style="width: 1130.327px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header py-2">
              <p class="lead text-info m-0">DAFTAR BARANG MASUK</p>
              <a href="/buatPO" style="color: aliceblue; text-decoration: none;">
                <button class="btn btn-primary" type="button">
                  Buat PO
                </button>
              </a>
              <a href="/buatRetur" style="color: aliceblue; text-decoration: none;">
                <button class="btn btn-primary" type="button">
                  Buat Retur
                </button>
              </a>
              <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalAddBM" id="addBtn">
                Tambah Barang Masuk
              </button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalReportBM" id="reportBtn">
                Report
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive table mb-0 pt-3 pr-2">
                <div class="mb-1">
                  <?= $pagerBM->links('tablebrgmasuk', 'custom_pager') ?>
                </div>
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 81.646px;">Tanggal</th>
                      <th style="width: 120px;">Nama Barang</th>
                      <th style="width: 48px;">Jumlah</th>
                      <th style="width: 31.646px;">Unit</th>
                      <th style="width: 120px;">Supplier</th>
                      <th class="text-center" style="width: 4px;">
                        <i class="fa fa-gears" style="font-size: 22px;"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($brgMasuk as $bm) { ?>
                      <tr>
                        <td><?= $bm['tanggalMasuk']; ?></td>
                        <td><?= $bm['namaBarang']; ?></td>
                        <td><?= $bm['jumlahBarang']; ?></td>
                        <td><?= $bm['unit']; ?></td>
                        <td><?= $bm['namaSupp']; ?></td>
                        <td class="d-flex justify-content-center">
                          <button onclick="getFormBM(this.id)" data-toggle="modal" data-target="#modalEdit" type="button" style="color: var(--red);" id="<?= $bm['idBrgMasuk']; ?>">
                            <i class="fa fa-pencil pr-2" style="font-size: 22px;color: var(--green);">
                            </i>
                          </button>
                          <form action="/delBM/<?= $bm['idBrgMasuk']; ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="color: var(--red);">
                              <i class="fa fa-trash-o" style="font-size: 22px;color: var(--red);"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- MODAL TAMBAH BARANG -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalAddBM">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FORM BARANG</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="/InsertBM" method="POST" id="formAddBM">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="inputNamaBM">Nama Barang</label>
              <select type="text" class="form-control selectpicker" name="inputNamaBM" id="inputNamaBM" data-size="10" data-live-search="true" aria-describedby="namaBarangHelp" required>
                <?php foreach ($barang as $key => $value) : ?>
                  <option name="optNamaBrg" data-tokens="<?= $value['namaBarang']; ?>" value="<?= $value['namaBarang']; ?>" data-stok="<?= $value['stok']; ?>" data-supp="<?= $value['supplier']; ?>" data-unit="<?= $value['unit']; ?>">
                    <?= $value['namaBarang']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="inputSupplier">Supplier</label>
              <input type="text" class="form-control pr-3" name="inputSupplierBM" id="inputSupplierBM" value="" readonly>
            </div>
            <div class="d-inline-flex">
              <div class="form-group pl-0 pr-2 col-md-2">
                <label for="inputStok">Stok</label>
                <input type="text" class="form-control" name="inputStokBM" id="inputStokBM" aria-describedby="stokHelp" disabled>
              </div>
              <div class="form-group pl-0 pr-2 col-md-2">
                <label for="inputUnitBM">Unit</label>
                <input type="text" class="form-control" name="inputUnitBM" id="inputUnitBM" aria-describedby="unitHelp" value="" readonly>
              </div>
              <div class="form-group pl-0 pr-2 col-md-2">
                <label for="inputJumlahBM">Jumlah</label>
                <input type="number" class="form-control" name="inputJumlahBM" required>
              </div>
              <div class="form-group pl-0 pr-2 col-md-6">
                <label for="inputTanggalBM">Tanggal Masuk</label>
                <input class="form-control datepicker" name="inputTanggalBM" id="inputTanggalBM">
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- MODAL EDIT BARANG -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDIT BARANG MASUK</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="/updateBM/" method="POST" id="formEditBM">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="editNamaBM">Nama Barang</label>
              <input type="text" class="form-control selectpicker" name="editNamaBM" id="editNamaBM" data-size="10" data-live-search="true" aria-describedby="namaBarangHelp" readonly>
            </div>
            <div class="d-inline-flex">
              <div class="form-group pl-0 pr-2 col-md-2">
                <label for="editUnitBM">Unit</label>
                <input type="text" class="form-control" name="editUnitBM" id="editUnitBM" aria-describedby="unitHelp" value="" readonly>
              </div>
              <div class="form-group pl-0 pr-2 col-md-2">
                <label for="editJumlahBM">Jumlah</label>
                <input type="number" class="form-control" name="editJumlahBM" required>
              </div>
              <div class="form-group pl-0 pr-2 col-md-6">
                <label for="editTanggalBM">Tanggal Masuk</label>
                <input class="form-control datepicker" name="editTanggalBM" id="editTanggalBM">
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL REPORT BM -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalReportBM">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Laporan Pembelian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <table class="table table-striped table-sm my-0 mydatatable text-sm">
            <thead class="text-left">
              <tr>
                <th style="width: 81.646px;">Tanggal</th>
                <th style="width: 120px;">Nama Barang</th>
                <th style="width: 48px;">Jumlah</th>
                <th style="width: 31.646px;">Unit</th>
                <th style="width: 120px;">Supplier</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($brgMasuk as $bm) { ?>
                <tr>
                  <td><?= $bm['tanggalMasuk']; ?></td>
                  <td><?= $bm['namaBarang']; ?></td>
                  <td><?= $bm['jumlahBarang']; ?></td>
                  <td><?= $bm['unit']; ?></td>
                  <td><?= $bm['namaSupp']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>