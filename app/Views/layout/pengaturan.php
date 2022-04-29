<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container" style="margin-top: 21px;padding-left: 0px;padding-right: 0px;">
  <div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link cuz active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profil Toko</a>
        <a class="nav-link cuz" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Nomor Pengingat</a>
        <button class="btn btn-rounded btn-outline-primary shadow mt-3" form="form">
          Simpan Perubahan
        </button>
      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <div class="card">
            <div class="card-body shadow a">
              <form action="" method="post" id="form">
                <div class="row mb-3">
                  <label for="inputNamaToko" class="col-sm-3 ">Nama Toko</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputNamaToko" value="<?= $profil['namaProfil']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="floatingTextarea2" class="col-sm-3 ">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" value=""><?= $profil['alamatProfil']; ?>
                  </textarea>
                    <div class="col-sm-5">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <div class="card">
            <div class="card-body shadow b">
              <form action="" method="post">
                <div class="row mb-3">
                  <label for="inputNoWA" class="col-sm-3 ">Nomor Whatsapp</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputNoWA" value="<?= $profil['noWA']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNoHP" class="col-sm-3 ">Nomor Handphone</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputNoHP" value="<?= $profil['noHP']; ?>">

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>