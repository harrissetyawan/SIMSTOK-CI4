<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="text-left d-xl-flex justify-content-xl-center content" style="margin-top: -1px;width: 100%;">
	<section class="mt-4" style="width: 1130.327px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-header py-2">
							<p class="lead text-info m-0">DAFTAR BARANG KELUAR</p>
							<button class="btn btn-primary" type="button">
								<a href="/addBrgKeluar" style="color: aliceblue; text-decoration: none;">TAMBAH</a>
							</button>
							<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalReportBK" id="reportBtn">
								REPORT
							</button>
						</div>
						<div class="card-body">
							<div class="mb-1">
								<?= $pager->links('tablebarang', 'custom_pager') ?>
							</div>
							<div class="table-responsive table mb-0 pt-3 pr-2">
								<table class="table table-striped table-sm my-0 mydatatable">
									<thead class="text-left">
										<tr>
											<th style="width: 10px;">Tanggal</th>
											<th style="width: 150px;">Nama Barang</th>
											<th style="width: 48px;">Jumlah</th>
											<th style="width: 31px;">Unit</th>
											<th style="width: 79px;">Supplier</th>
											<th class="text-center" style="width: 31.723px;">
												<i class="fa fa-gears" style="font-size: 22px;"></i>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($brgKeluar as $bk) { ?>
											<tr>
												<td><?= $bk['tglBrgKeluar']; ?></td>
												<td><?= $bk['namaBarang']; ?></td>
												<td><?= $bk['jumlahBarang']; ?></td>
												<td><?= $bk['namaUnit']; ?></td>
												<td><?= $bk['namaSupp']; ?></td>
												<td class="text-center">
													<form action="/delBK/<?= $bk['idBrgKeluar']; ?>" method="post">
														<input type="hidden" name="_method" value="DELETE">
														<button type="submit" style="color: var(--red);">
															<i class="fa fa-trash-o" style="font-size: 22px;color: var(--red);"></i>
														</button>
													</form>
												</td>
											</tr>
										<?php } ?>
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
<div class="modal fade" role="dialog" tabindex="-1" id="modalAddPenjualan">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">FORM BARANG</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div>
					<form>
						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Nama Barang</label>
						</div>


						<div class="group">
							<input type="text" disabled>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Stok</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Jumlah</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Nama Barang</label>
						</div>


					</form>
				</div>
			</div>
			<div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
		</div>
	</div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalEdit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">FORM BARANG</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div>
					<form>
						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Nama Barang</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Supplier</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Kategori</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Unit</label>
						</div>


						<div class="group">
							<input type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Stok Awal</label>
						</div>


					</form>
				</div>
			</div>
			<div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
		</div>
	</div>
</div>

<!-- MODAL REPORT BK -->
<div class="modal fade" role="dialog" tabindex="-1" id="modalReportBK">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Laporan Penjualan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="button-header">
			</div>
			<div class="modal-body">
				<button onclick="window.print()" id="btn-print" type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">Print</span>
				</button>
				<div class="table-responsive table mb-0 pt-3 pr-2">
					<table class="table table-striped table-sm my-0 mydatatable text-sm">
						<thead class="text-left">
							<tr>
								<th style="width: 10px;">Tanggal</th>
								<th style="width: 150px;">Nama Barang</th>
								<th style="width: 48px;">Jumlah</th>
								<th style="width: 31px;">Unit</th>
								<th style="width: 79px;">Supplier</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($brgKeluar as $bk) { ?>
								<tr>
									<td><?= $bk['tglBrgKeluar']; ?></td>
									<td><?= $bk['namaBarang']; ?></td>
									<td><?= $bk['jumlahBarang']; ?></td>
									<td><?= $bk['namaUnit']; ?></td>
									<td><?= $bk['namaSupp']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div> -->
		</div>
	</div>
</div>
<?= $this->endSection(); ?>