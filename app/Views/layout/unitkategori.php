<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content d-flex justify-content-center">
  <button class="btn btn-primary btn-lg mt-3 shadow" type="button" data-toggle="modal" data-target="#modalSaveKat">TAMBAH DATA <i class="fa fa-plus-circle"></i></button>
</div>
<div class="text-left d-xl-flex flex-row justify-content-between justify-content-xl-center content" style="margin-top: -1px;width: 100%;">
  <section id="tblKategori" class="mt-4" style="width: 535px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header flex-column py-2">
              <p class="lead text-info m-0" style="width: 100%;padding-bottom: 4px;">DAFTAR KATEGORI</p>
              <!-- <button class="btn btn-primary" type="button" style="padding-top: 0px;" data-toggle="modal" data-target="#modalSaveKat">TAMBAH</button> -->
            </div>
            <div class="card-body" style="padding: 10px;">
              <div class="table table-responsive mb-0 pt-3 pr-2">
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 28px;">Nama Kategori</th>
                      <th style="width: 43px;">Keterangan</th>
                      <th class="text-center flex-row justify-content-center" style="width: 40.723px;">
                        <i class="fa fa-gears" style="font-size: 25px;">
                        </i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($kategori as $k) : ?>
                      <tr>
                        <td><?= $k['namaKategori']; ?></td>
                        <td class="d-inline-block text-truncate" style="max-width: 113px;"><?= $k['Keterangan']; ?></td>
                        <td class="text-center">
                          <a href="/editKat/<?= $k['idKategori']; ?>">
                            <i class="fa fa-pencil pr-2" style="font-size: 22px;color: var(--green);"></i>
                          </a>
                          <form action="/kategori/<?= $k['idKategori']; ?>" method="post" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="color: var(--red);">
                              <i class="fa fa-trash-o" style="font-size: 22px;"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="pt-2">
                  <?= $pagerKat->links('tablekategori', 'custom_pager') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="tblMerk" class="mt-4" style="width: 300px;">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header flex-column py-2">
              <p class="lead text-info m-0" style="width: 100%;padding-bottom: 4px;">DAFTAR MERK</p>
            </div>
            <div class="card-body" style="padding: 10px;">
              <div class="table table-responsive mb-0 pt-3 pr-2">
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 28px;">Nama Merk</th>
                      <th class="text-center flex-row justify-content-center" style="width: 40.723px;"><i class="fa fa-gears" style="font-size: 25px;"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($merk as $m) : ?>
                      <tr>
                        <td><?= $m['namaMerk']; ?></td>
                        <td class="text-center">
                          <a href="/fetchMerk/<?= $m['idMerk']; ?>">
                            <i class="fa fa-pencil pr-2" style="font-size: 22px;color: var(--green);"></i>
                          </a>
                          <form action="/deleteMerk/<?= $m['idMerk']; ?>" method="post" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="color: var(--red);">
                              <i class="fa fa-trash-o" style="font-size: 22px;"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="pt-2">
                  <?= $pagerKat->links('tablekategori', 'custom_pager') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="tbUnit" class="mt-4" style="width: 535px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header flex-column py-2">
              <p class="lead text-info m-0" style="width: 100%;padding-bottom: 4px;">DAFTAR UNIT</p>
            </div>
            <div class="card-body" style="padding: 10px;">
              <div class="table-responsive table mb-0 pt-3 pr-2">
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 89px;">Nama Unit</th>
                      <th style="width: 43px;">Keterangan</th>
                      <th class="text-center flex-row justify-content-center" style="width: 40.723px;">
                        <i class="fa fa-gears" style="font-size: 25px;"></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($unit as $u) : ?>
                      <tr>
                        <td><?= $u['namaUnit']; ?></td>
                        <td><?= $u['keterangan']; ?></td>
                        <td class="text-center">
                          <a href="/editUnit/<?= $u['idUnit']; ?>">
                            <i class="fa fa-pencil pr-2" style="font-size: 22px;color: var(--green);"></i>
                          </a>
                          <form action="/unit/<?= $u['idUnit']; ?>" method="post" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="color: var(--red);">
                              <i class="fa fa-trash-o" style="font-size: 22px;"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="pt-2">
                  <?= $pager->links('tableunit', 'custom_pager') ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- MODAL SAVE DATA UNIT -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalSaveUnit" aria-labelledby="modalSaveUnit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">FORM UNIT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="/UnitKategori/saveUnit" method="POST">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="inputNamaUnit">Nama Unit</label>
              <input type="text" class="form-control" name="inputNamaUnit" id="inputNamaUnit" aria-describedby="namaUnitHelp">
            </div>
            <div class="form-floating">
              <label for="floatingTextarea2">Keterangan</label>
              <textarea class="form-control" name="deskripsi" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="modalSaveKat" aria-labelledby="modalSaveUnit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
        <h5 class="modal-title" style="color: #8f2b14; text-align: center;">TAMBAH DATA SALAH SATU ATAU SEKALIGUS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/UnitKategori/saveData" method="POST">
          <div class="">
            <div class="container">
              <?= csrf_field(); ?>
              <div class="form-group">
                <label for="inputNamaKat">Nama Kategori</label>
                <input type="text" class="form-control" name="inputNamaKat" id="inputNamaKat" aria-describedby="namaKatHelp" placeholder="Bangunan, Listrik, ...">
              </div>
              <div class="form-floating">
                <textarea class="form-control" name="deskripsiKat" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 100px"></textarea>
              </div>
            </div>
            <div class="container">
              <?= csrf_field(); ?>
              <div class="form-group mt-2">
                <label for="inputNamaUnit">Nama Unit</label>
                <input type="text" class="form-control" name="inputNamaUnit" id="inputNamaUnit" aria-describedby="namaKatHelp" placeholder="Satuan barang">
              </div>
              <div class="form-floating">
                <textarea class="form-control" name="deskripsiUnit" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 100px"></textarea>
              </div>
            </div>
            <div class="container">
              <?= csrf_field(); ?>
              <div class="form-group mt-2">
                <label for="inputNamaMerk">Nama Merk</label>
                <input type="text" class="form-control" name="inputNamaMerk" id="inputNamaMerk" aria-describedby="inputNamaMerk" placeholder="Avian, Tigaroda, ...">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL -->
<?= $this->endSection(); ?>