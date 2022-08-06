<?= $this->extend('/layout/main'); ?>

<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: 0px;width: 100%;height: 100%;">
  <section class="mt-4" style="width: 950px;height: 300px;max-height: 520px;">
    <div class="container-fluid">
      <form action="/UnitKategori/updateMerk/<?= $merk['idMerk']; ?>" method="POST" class="justify-content-center">
        <div class="form-group">
          <label for="inputNamaUnit">Nama Merk</label>
          <input type="text" class="form-control" name="inputNamaUnit" id="inputNamaUnit" aria-describedby="namaUnitHelp" value="<?= $merk['namaMerk']; ?>">
        </div>
        <div class="form-floating">
          <label for="deksMerk">Keterangan</label>
          <textarea class="form-control" name="deskMerk" placeholder="Deskripsi (optional)" id="deskMerk" style="height: 100px"></textarea>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Submit</button>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>