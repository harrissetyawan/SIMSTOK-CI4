<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= $title; ?></title>
	<link rel="stylesheet/less" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-datepicker.min.css">
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
	<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="color: var(--blue);background: var(--gray-dark);height: 30px;">
		<div class="container">
			<button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
				<span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
			<a class="navbar-brand" href="/" style="color: var(--orange);"><i class="fa fa-ioxhost pr-2"></i>SIMSTOK TB SANO</a>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item" style="color: var(--white);width: 109px;padding-right: 1px;">
						<a class="nav-link <?= $uri->getSegment(1) == 'pengaturan' ? 'linkactivated' : ''; ?>" id="linkmenu" href="<?= base_url('/pengaturan'); ?>">Pengaturan</a>
					</li>
					<li class="nav-item" style="color: var(--white);width: 100px;">
						<a class="nav-link" href="/logout" style="color: var(--white);padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;">Keluar
							<i class="fa fa-power-off" style="padding-left: 5px;color: var(--red);"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-light navbar-expand-md sticky-top text-center border rounded-0 d-xl-flex align-self-center align-items-xl-center" style="height: 90px;padding: 0px;box-shadow: 0px 0px 8px 1px;border-color: var(--white);border-bottom: 4px solid rgb(52,58,64);opacity: 1;color: #222222;background: var(--light);">
		<div class="container-fluid">
			<div class="d-flex flex-grow-1 justify-content-center" style="/*width: 0px;*/max-width: 96;height: 100%;border-color: var(--white);">
				<a class="navMenuBtn" href="<?= base_url('/'); ?>">
					<div class="ops-menu <?= $uri->getSegment(1) == '' ? 'aktif' : ''; ?>" style="height: 100%;">
						<i class="fa fa-cube d-inline float-none"></i>
						<h1 style="font-size: 15px;padding-top: 6px;">
							Barang
						</h1>
					</div>
				</a>
				<a class="navMenuBtn" href="<?= base_url('/unitkategori'); ?>">
					<div class="ops-menu <?= $uri->getSegment(1) == 'unitkategori' ? 'aktif' : ''; ?>" style="height: 100%;">
						<i class="fa fa-cubes d-inline float-none"></i>
						<h1 style="font-size: 15px;padding-top: 6px;">
							Unit Kategori
						</h1>
					</div>
				</a>
				<a class="navMenuBtn" href="<?= base_url('/barangkeluar'); ?>">
					<div class="ops-menu <?= $uri->getSegment(1) == 'barangkeluar' ? 'aktif' : ''; ?>" style="height: 100%;">
						<i class="fa fa-shopping-basket d-inline float-none"></i>
						<h1 style="font-size: 15px;padding-top: 6px;">
							Barang Keluar
						</h1>
					</div>
				</a>
				<a class="navMenuBtn" href="<?= base_url('/barangmasuk'); ?>">
					<div class="ops-menu <?= $uri->getSegment(1) == 'barangmasuk' ? 'aktif' : ''; ?>" style="height: 100%;">
						<i class="fa fa-cart-arrow-down d-inline float-none"></i>
						<h1 style="font-size: 15px;padding-top: 6px;">
							Barang Masuk
						</h1>
					</div>
				</a>
				<a class="navMenuBtn" href="<?= base_url('/supplier'); ?>">
					<div class="ops-menu <?= $uri->getSegment(1) == 'supplier' ? 'aktif' : ''; ?>" style="height: 100%;">
						<i class="fa fa-users d-inline float-none"></i>
						<h1 style="font-size: 15px;padding-top: 6px;">
							Supplier
						</h1>
					</div>
				</a>
			</div>
		</div>
	</nav>
	<?= $this->renderSection('content'); ?>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
	<script src="/assets/js/bootstrap-select.min.js"></script>
	<script src="/assets/less.js/dist/less.min.js" type="text/javascript"></script>
	<script src="/assets/js/script.js" type="text/javascript"></script>
	<script src="/assets/bootstrap/js/popper.min.js"></script>
	<script src="/assets/bootstrap/js/jquery.dataTables.min.js"></script>
	<script src="/assets/bootstrap/js/dataTables.bootstrap4.min.js"></script>
	<!-- SDA -->
	<script src="/assets/js/DataTable---Fully-BSS-Editable.js"></script>
	<script src="/assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
	<script src="/assets/js/Dynamic-Table.js"></script>
</body>

</html>