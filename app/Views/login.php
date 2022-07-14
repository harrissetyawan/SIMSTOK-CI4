<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Login</title>
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
  <div class="container-fluid">
    <div class="row mh-100vh">
      <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
        <div class="m-auto w-lg-75 w-xl-50">
          <h2 class="text-info font-weight-light mb-5" style="color: var(--red);"><i class="fa fa-ioxhost" style="color: var(--orange);text-shadow: 0px 0px 1px var(--secondary);"></i>&nbsp;SIM TB SANO</h2>
          <?php if (session()->getFlashdata('msg')) { ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
          <?php } ?>
          <form action="/Login/Auth" method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="username" placeholder="Username" autocomplete="username">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="current-password">
            </div>
            <button class="btn btn-info mt-2" type="submit" style="background: var(--orange);font-style: normal;">Log In</button>
          </form>
          <p class="mt-3 mb-0"><a class="text-info small" href="/resetcode" style="color: var(--gray-dark);">Forgot your email or password?</a></p>
        </div>
      </div>
      <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background: url('/assets/img/james-kovin-YQGPSblLPz0-unsplash.jpg') center center / cover;filter: blur(3px);">
      </div>
    </div>
  </div>
  <footer class="footer-dark" style="padding: 20px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 item">
          <h3></h3>
          <ul>
          </ul>
        </div>
        <div class="col-sm-6 col-md-3 item"></div>
        <div class="col-md-6 item text">
          <h3>TB SANO MATRIAL</h3>
          <p>Sistem Informasi Manajemen Stok TB SANO MATRIAL</p>
        </div>
        <div class="col item social">
        </div>
      </div>
      <p class="copyright">TB SANO MATRIAL</p>
    </div>
  </footer>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
  <script src="/assets/js/bootstrap-select.min.js"></script>
  <script src="/assets/less.js/dist/less.min.js" type="text/javascript"></script>
  <script src="/assets/js/script.js" type="text/javascript"></script>
  <script src="/assets/bootstrap/js/popper.min.js"></script>
  <script src="/assets/bootstrap/js/jquery.dataTables.min.js"></script>

  <!-- SDA -->

  <script src="/assets/js/DataTable---Fully-BSS-Editable.js"></script>
  <script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
  <script src="/assets/js/Dynamic-Table.js"></script>
</body>

</html>