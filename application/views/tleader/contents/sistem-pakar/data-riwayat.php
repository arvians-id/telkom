<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Riwayat</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_riwayat') ?>">Kelola Riwayat</a></div>
				<div class="breadcrumb-item active">Data</div>
			</div>
		</div>
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('success'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php elseif ($this->session->flashdata('error')) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('error'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<h2 class="section-title">Data Riwayat</h2>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Riwayat</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Kode Riwayat</th>
											<th>Kode Pelanggan</th>
											<th>Kode Modem</th>
											<th>Tanggal Keluhan</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getRiwayat as $riwayat) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $riwayat['kode_riwayat'] ?>
													<br>
													<a href="<?= base_url('tleader/ubah_riwayat/' . $riwayat['kode_riwayat']) ?>">Ubah</a> |
													<a href="<?= base_url('tleader/hapus_riwayat/' . $riwayat['kode_riwayat']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
												</td>
												<td><?= $riwayat['kode_pelanggan'] ?></td>
												<td><?= $riwayat['kode_modem'] ?></td>
												<td><?= $riwayat['created_at'] ?></td>
											</tr>
										<?php endforeach ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<img src="" id="image" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
