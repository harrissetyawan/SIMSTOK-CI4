<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;height: 100%;">
  <section class="mt-4" style="width: 950px;height: 300px;max-height: 520px;">
    <div class="container-fluid">
      <form action="/Update/<?= $barang['id']; ?>" method="POST" class="justify-content-center">
        <div class="form-group">
          <label for="InputNamaBarang">Nama Barang</label>
          <input type="hidden" name="idUpdate" value="<?= $barang['id']; ?>">
          <input type="text" class="form-control" name="inputNamaBarang" id="inputNamaBarang" aria-describedby="namaBarangHelp" value="<?= $barang['namaBarang']; ?>">
        </div>
        <div class="form-group">
          <label for="input">Harga</label>
          <input type="text" class="form-control" name="inputHarga" id="inputHarga" value="<?= $barang['harga']; ?>">
        </div>
        <div class="form-group">
          <label for="input">Stok Awal</label>
          <input type="text" class="form-control" name="inputStokAwal" id="inputStokAwal" value="<?= $barang['stok']; ?>">
        </div>
        <div class="selectGroups" style="display: flex;">
          <div class="form-group">
            <label class=" pr-5" for="#selectOptUnit">Unit</label>
            <select id="selectOptUnit" class="selectpicker" name="selectOptUnit" data-live-search="true">
              <option name="opt" data-tokens="<?= $barang['unit']; ?>" value="<?= $barang['unit']; ?>"><?= $barang['unit']; ?>
              </option>
              <?php foreach ($unit as $value) : ?>
                <?php if ($value['namaUnit'] !== $barang['unit']) { ?>
                  <option name="opt" data-tokens="<?= $value['namaUnit']; ?>" value="<?= $value['namaUnit']; ?>"><?= $value['namaUnit']; ?>
                  </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="pr-3" for="#selectOptKat">Kategori</label>
            <select id="selectOptKat" class="selectpicker" name="selectOptKat" data-live-search="true">
              <option name="optKat" data-tokens="<?= $barang['kategori']; ?>" value="<?= $barang['kategori']; ?>"><?= $barang['kategori']; ?>
              </option>
              <?php foreach ($kategori as $value) : ?>
                <?php if ($value['namaKategori'] !== $barang['kategori']) { ?>
                  <option name="optKat" data-tokens="<?= $value['namaKategori']; ?>" value="<?= $value['namaKategori']; ?>"><?= $value['namaKategori']; ?></option>
                <?php } else {
                } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="pr-5" for="#selectOptMerk">Merk</label>
            <select id="selectOptMerk" class="selectpicker" name="selectOptMerk" data-live-search="true">
              <option name="opt" data-tokens="<?= $barang['merk']; ?>" value="<?= $barang['merk']; ?>"><?= $barang['merk']; ?>
              </option>
              <?php foreach ($merk as $value) : ?>
                <?php if ($value['namaMerk'] !== $barang['merk']) { ?>
                  <option name="optMerk" data-tokens="<?= $value['namaMerk']; ?>" value="<?= $value['namaMerk']; ?>"><?= $value['namaMerk']; ?>
                  </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="pr-5" for="#selectOptSupp">Merk</label>
            <select id="selectOptSupp" class="selectpicker" name="selectOptSupp" data-live-search="true">
              <option name="opt" data-tokens="<?= $barang['supplier']; ?>" value="<?= $barang['supplier']; ?>"><?= $barang['supplier']; ?>
              </option>
              <?php foreach ($supplier as $value) : ?>
                <?php if ($value['namaSupp'] !== $barang['supplier']) { ?>
                  <option name="opt" data-tokens="<?= $value['namaSupp']; ?>" value="<?= $value['namaSupp']; ?>"><?= $value['namaSupp']; ?>
                  </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-floating">
          <label for="floatingTextarea2">Deskripsi</label>
          <textarea class="form-control" name="deskripsi" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 75px"><?= $barang['deskripsi']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Submit</button>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>