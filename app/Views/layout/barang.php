<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;height: 100%;">
  <section class="mt-4" style="width: 1130.327px;height: 520px;max-height: 520px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header flex-column py-2">
              <p class="lead text-info m-0" style="width: 700px;padding-bottom: 4px;color: var(--orange);">DAFTAR BARANG</p>
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" type="button">TAMBAH</button>
            </div>
            <div class="card-body" style="padding: 0px 10px 10px 10px;">
              <div class="table-responsive table pr-2">
                <div class="mb-1">
                  <?= $pager->links('tablebarang', 'custom_pager') ?>
                </div>
                <table class="table table-striped table-sm my-0 mydatatable">
                  <thead class="text-left">
                    <tr>
                      <th style="width: 200px;">Nama Barang</th>
                      <th style="width: 45px;">Stok</th>
                      <th style="width: 65px;">Satuan</th>
                      <th style="width: 65px;">Merk</th>
                      <th style="width: 235px;">Nama Supplier</th>
                      <th class="text-left" style="width: 87.723px;">Kategori</th>
                      <th class="text-left" style="width: 87.723px;">Deskripsi</th>
                      <th class="text-center" style="width: 50px;"><i class="fa fa-gears" style="font-size: 24px;"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($barang as $key => $value) : ?>
                      <tr>
                        <td><?= $value['namaBarang'] ?></td>
                        <td><?= $value['stok'] ?></td>
                        <td><?= $value['unit'] ?></td>
                        <td><?= $value['merk'] ?></td>
                        <td><?= $value['supplier'] ?></td>
                        <td><?= $value['kategori'] ?></td>
                        <td><?= $value['deskripsi'] ?></td>
                        <td class="align-content-center d-inline-flex">
                          <a href="/Edit/<?= $value['id']; ?>">
                            <i class="fa fa-pencil pr-2" style="font-size: 22px;color: var(--green);"></i>
                          </a>
                          <form action="/Home/<?= $value['id']; ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" style="color: var(--red);">
                              <i class="fa fa-trash-o" style="font-size: 22px;color: var(--red);"></i>
                            </button>
                          </form>
                        <?php endforeach; ?>
                        </td>
                      </tr>
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
<!-- MODAL SAVE DATA -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalEdit" aria-labelledby="modalEditLabel" aria-hidden="true">
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
          <form action="" method="POST" id="formBarang">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="InputNamaBarang">Nama Barang</label>
              <input type="text" class="form-control" name="inputNamaBarang" id="inputNamaBarang" aria-describedby="namaBarangHelp">
            </div>
            <div class="d-inline-flex">
              <div class="form-group pr-2">
                <label for="input">Harga</label>
                <input type="text" class="form-control" name="inputHarga" id="inputHarga">
              </div>
              <div class="form-group pl-0 pr-2 col-md-3">
                <label for="input">Stok Awal</label>
                <input type="text" class="form-control" name="inputStokAwal" id="inputStokAwal">
              </div>
              <div class="form-group pr-0">
                <label for="#selectOptUnit">Unit</label>
                <select id="selectOptUnit" class="form-control col-auto selectpicker" name="selectOptUnit" data-live-search="true" data-size="5">
                  <?php foreach ($unit as $key => $value) : ?>
                    <option data-subtext="<?= $value['keterangan'] ?>" name="opt" data-tokens="<?= $value['namaUnit']; ?>" value="<?= $value['namaUnit']; ?>">
                      <?= $value['namaUnit']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="#selectOptSupplier">Supplier</label>
              <select id="selectOptSupplier" class="form-control selectpicker" name="selectOptSupplier" data-live-search="true" data-size="5">
                <?php foreach ($supplier as $value) : ?>
                  <option data-tokens="<?= $value['namaSupp'] ?>" value="<?= $value['namaSupp'] ?>"><?= $value['namaSupp'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="d-flex">
              <div class="form-group">
                <label class="pr-5" for="#selectOptMerk">Merk</label>
                <select id="selectOptMerk" class="selectpicker pr-3" name="selectOptMerk" data-live-search="true" data-size="5">
                  <?php foreach ($merk as $value) : ?>
                    <option data-tokens="<?= $value['namaMerk'] ?>" value="<?= $value['namaMerk'] ?>"><?= $value['namaMerk'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label class="pr-3" for="#selectOptKat">Kategori</label>
                <select id="selectOptKat" name="selectOptKat" class="selectpicker" data-live-search="true" data-size="5">
                  <?php foreach ($kategori as $value) : ?>
                    <option data-tokens="<?= $value['namaKategori'] ?>" name="selectOptKat" value="<?= $value['namaKategori'] ?>"><?= $value['namaKategori'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-floating">
              <label for="floatingTextarea2">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" formaction="/Home/save">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>