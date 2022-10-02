
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet/less" href="/assets/css/style.css">
  <link rel="stylesheet" media="print" href="/assets/css/print.css">
  <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="/assets/css/-Login-form-Page-BS4-.css">
  <link rel="stylesheet" href="/assets/css/Button-Change-Text-on-Hover.css">
  <link rel="stylesheet" href="/assets/css/Dynamic-Table.css">
  <link rel="stylesheet" href="/assets/css/Footer-Basic.css">
  <link rel="stylesheet" href="/assets/css/Footer-Dark.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="/assets/bootstrap/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/css/Navigation-Clean.css">
  <link rel="stylesheet" href="/assets/css/Off-Canvas-Sidebar-Drawer-Navbar.css">
</head>

<body style="height: 100%; background-color: #fbfbfb;">
  <nav class="navbar navbar-light navbar-expand-md navigation-clean d-print-none" style="color: var(--blue);background: var(--gray-dark);height: 30px;">
    <div class="container">
      <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <a class="navbar-brand" href="/" style="color: var(--orange);"><i class="fa fa-ioxhost pr-2"></i>SIMSTOK TB SANO</a>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item d-flex" style="color: var(--white);width: 109px;padding-right: 1px;"><a class="nav-link" href="<?= base_url('/pengaturan'); ?>" style="color: var(--white);padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;width: 112px;">Pengaturan</a></li>
          <li class="nav-item d-flex" style="color: var(--white);width: 100px;"><a class="nav-link" href="#" style="color: var(--white);padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;">KELUAR<i class="fa fa-power-off" style="padding-left: 5px;color: var(--red);"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <?= $this->renderSection('content'); ?>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
  <script src="/assets/js/bootstrap-select.min.js"></script>
  <script src="/assets/bootstrap/js/jquery.dataTables.min.js"></script>
  <script src="/assets/bootstrap/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/bootstrap/js/dataTables.buttons.min.js"></script>
  <script src="/assets/js/script.js"></script>
  <script src="/assets/less.js/dist/less.min.js" type="text/javascript"></script>
  <script src="/assets/bootstrap/js/popper.min.js"></script>
  <!-- SDA -->

  <script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar.js"></script>
  <script src="/assets/js/DataTable---Fully-BSS-Editable.js"></script>
  <script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
</body>

</html>