<?= $this->extend('/layout/main'); ?>

<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;height: 100%;">
  <section class="mt-4" style="width: 950px;height: 300px;max-height: 520px;">
    <div class="container-fluid">
      <form action="/UnitKategori/updateUnit/<?= $unit['idUnit']; ?>" method="POST" class="justify-content-center">
        <div class="form-group">
          <label for="inputNamaUnit">Nama Supplier</label>
          <input type="text" class="form-control" name="inputNamaUnit" id="inputNamaUnit" aria-describedby="namaUnitHelp" value="<?= $unit['namaUnit']; ?>">
        </div>
        <div class="form-floating">
          <label for="floatingTextarea2">Keterangan</label>
          <textarea class="form-control" name="deskUnit" placeholder="Deskripsi (optional)" id="floatingTextarea2" style="height: 100px"></textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Submit</button>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>