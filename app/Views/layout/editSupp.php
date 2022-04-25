<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;height: 100%;">
  <section class="mt-4" style="width: 950px;height: 300px;max-height: 520px;">
    <div class="container-fluid">
      <form action="/Supplier/updateData/<?= $supplier['idSupp']; ?>" method="POST" class="justify-content-center">
        <div class="form-group">
          <input type="hidden" name="id" value="<?= $supplier['idSupp']; ?>">
          <label for="inputNamaSupp">Nama Supplier</label>
          <input type="text" class="form-control" name="inputNamaSupp" id="inputNamaSupp" aria-describedby="namaBarangHelp" value="<?= $supplier['namaSupp']; ?>">
        </div>
        <div class="form-group">
          <label for="InputAlamatSupp">Alamat Supplier</label>
          <input type="text" class="form-control" name="InputAlamatSupp" id="InputAlamatSupp" aria-describedby="namaBarangHelp" value="<?= $supplier['alamatSupp']; ?>">
        </div>
        <div class="form-group">
          <label for="inputNoTelpSupp">No Telpon</label>
          <input type="text" class="form-control" name="inputNoTelpSupp" id="inputNoTelpSupp" aria-describedby="namaBarangHelp" value="<?= $supplier['noTelpSupp']; ?>">
        </div>
        <div class="form-floating">
          <label for="floatingTextarea2">Keterangan</label>
          <textarea class="form-control" name="deskripsi" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 75px"><?= $supplier['Keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Submit</button>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>