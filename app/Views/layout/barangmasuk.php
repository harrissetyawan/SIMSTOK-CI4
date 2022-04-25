<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: -1px;width: 100%;">
  <section class="mt-4" style="width: 1130.327px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header py-2">
              <p class="lead text-info m-0">DAFTAR BARANG MASUK</p>
              <button class="btn btn-primary" type="button">
                <a href="/buatPO" style="color: aliceblue; text-decoration: none;">Buat PO</a>
              </button>
              <button class="btn btn-info" type="button">
                <a href="/addBrgMasuk" style="color: aliceblue; text-decoration: none;">Tambah Barang <i class="fa fa-plus-square"></i></a>
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive table mb-0 pt-3 pr-2">
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 81.646px;">Tanggal</th>
                      <th style="width: 271.215px;">Nama Barang</th>
                      <th style="width: 48px;">Jumlah</th>
                      <th style="width: 31.646px;">Unit</th>
                      <th style="width: 31.646px;">Supplier</th>
                      <th class="text-center" style="width: 31.723px;"><i class="fa fa-gears" style="font-size: 22px;"></i></th>
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
                        <td class="text-center">
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
<div class="modal fade" role="dialog" tabindex="-1" id="modalAddPenjualan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FORM BARANG</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div>
          <form>
            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Nama Barang</label>
            </div>


            <div class="group">
              <input type="text" disabled>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Stok</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Jumlah</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Nama Barang</label>
            </div>


          </form>
        </div>
      </div>
      <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
    </div>
  </div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="modalEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FORM BARANG</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div>
          <form>
            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Nama Barang</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Supplier</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Kategori</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Unit</label>
            </div>


            <div class="group">
              <input type="text" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Stok Awal</label>
            </div>


          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection(); ?>