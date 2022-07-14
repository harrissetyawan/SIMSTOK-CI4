<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Reset</title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="/assets/css/-Login-form-Page-BS4-.css">
  <link rel="stylesheet" href="/assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="/assets/css/Footer-Basic.css">
  <link rel="stylesheet" href="/assets/css/Footer-Dark.css">
  <link rel="stylesheet" href="/assets/css/Google-Style-Text-Input.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="/assets/css/Navigation-Clean.css">
  <link rel="stylesheet" href="/assets/css/Off-Canvas-Sidebar-Drawer-Navbar.css">
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
  <p><?= $otpcode; ?></p>
  <div class="container-fluid">
    <div class="row mh-100vh">
      <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
        <div class="m-auto w-lg-75 w-xl-50">
          <h2 class="text-info font-weight-bold mb-1" style="color: var(--red);">
            <i class="fa fa-ioxhost" style="color: var(--orange);text-shadow: 0px 0px 1px var(--secondary);">
            </i>&nbsp;SIM TB SANO
          </h2>
          <h4 class="text-info font-weight-light mb-5" style="color: var(--red);">Reset Credentials Form</h4>
          <?php if (session()->getFlashdata('msg')) { ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
          <?php } ?>
          <form action="/Login/checkOTP" method="post">
            <div class="form-group">
              <input class="form-control" type="number" name="otpInput" required="" placeholder="OTP Code">
            </div>
            <button class="btn btn-info mt-2" type="submit" style="background: var(--orange);font-style: normal;">Reset</button>
          </form>
        </div>
      </div>
      <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background: url('/assets/img/james-kovin-YQGPSblLPz0-unsplash.jpg') center center / cover;filter: blur(3px);">
      </div>
    </div>
  </div>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
  <script src="/assets/js/bootstrap-select.min.js"></script>
  <script src="/assets/less.js/dist/less.min.js" type="text/javascript"></script>
  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="/assets/bootstrap/js/popper.min.js"></script>
  <script src="/assets/bootstrap/js/jquery.dataTables.min.js"></script>
  <script src="/assets/bootstrap/js/dataTables.bootstrap4.min.js"></script>
  <!-- <script src="/assets/bootstrap/js/dataTables.buttons.min.js"></script> -->
  <!-- <script src="/assets/bootstrap/js/buttons.flash.min.js"></script>
	<script src="/assets/bootstrap/js/jszip.min.js"></script> -->
  <!-- SDA -->

  <!-- <script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar.js"></script> -->
  <script src="/assets/js/DataTable---Fully-BSS-Editable.js"></script>
  <script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
  <script src="/assets/js/Dynamic-Table.js"></script>
</body>

</html>