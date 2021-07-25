<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Pelanggan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Kaubis</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/data_pelanggan') ?>">Kelola Pelanggan</a></div>
				<div class="breadcrumb-item active">Data</div>
			</div>
		</div>
		<h2 class="section-title">Data Pelanggan</h2>
		<p class="section-lead">
			Halaman ini berisi data pelanggan dalam status (Done, Kendala, Cabut & Putus Sementara)
		</p>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pelanggan</h4>
						</div>
						<div class="card-body">
							<?= $countPelanggan ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-exclamation-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Kendala)</h4>
						</div>
						<div class="card-body">
							<?= $countKendala ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-spinner"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (On Progress)</h4>
						</div>
						<div class="card-body">
							<?= $countOnProgress ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Done)</h4>
						</div>
						<div class="card-body">
							<?= $countDone ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas fa-user-slash"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Cabut</h4>
						</div>
						<div class="card-body">
							<?= $countCabut ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-secondary">
						<i class="fas fa-user-lock"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Putus Sementara</h4>
						</div>
						<div class="card-body">
							<?= $countPutus ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Pelanggan</h4>
						</div>
						<div class="card-body">
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
							<div class="table-responsive">
								<table class="table table-striped" id="pelanggan">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>ID Pelanggan</th>
											<th>Nama</th>
											<th>Email</th>
											<th>No Handphone</th>
											<th>Alamat</th>
											<th>Paket</th>
											<th class="text-center">Photo</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getPelanggan as $pelanggan) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td style="width: 200px;">
													<?= $pelanggan['kode_pelanggan']  ?>
													<br>
													<a href="<?= base_url('kaubis/ubah_pelanggan/' . $pelanggan['id_pelanggan']) ?>">Ubah</a> |
													<a href="<?= base_url('kaubis/hapus_pelanggan/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin menghapus id pelanggan <?= $pelanggan['kode_pelanggan'] ?> ?')">Hapus</a>
													<?php if (in_array($pelanggan['status_id'], [2, 3, 4])) : ?>
														|
														<div class="dropdown d-inline">
															<a href="javascript:void(0);" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Ubah Status
															</a>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<?php if ($pelanggan['status_id'] == 2) : ?>
																	<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/3/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Cabut) ?')">Cabut</a>
																	<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/4/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Putus Sementara) ?')">Putus Sementara</a>
																<?php elseif (in_array($pelanggan['status_id'], [3, 4])) : ?>
																	<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/2/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Done) ?')">Done</a>
																<?php endif ?>
															</div>
														</div>
													<?php elseif ($pelanggan['status_id'] == 1) : ?>
														|
														<div class="dropdown d-inline">
															<a href="javascript:void(0);" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Ubah Status
															</a>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/2/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Done) ?')">Done</a>
															</div>
														</div>
													<?php endif ?>
												</td>
												<td><?= $pelanggan['nama'] ?></td>
												<td><?= $pelanggan['email'] ?></td>
												<td><?= $pelanggan['no_hp'] ?></td>
												<td><?= $pelanggan['alamat'] ?></td>
												<td><?= $pelanggan['paket'] ?></td>
												<td class="text-center">
													<a href="javascript:void(0);" class="ktp" data-ktp="<?= $pelanggan['photo_ktp'] ?>">KTP</a> | <a href="javascript:void(0);" class="selfie" data-selfie="<?= $pelanggan['photo_selfie'] ?>">Selfie</a>
												</td>
												<td class="text-center">
													<div class="badge badge-<?= $pelanggan['status_keterangan'] ?>"><?= $pelanggan['status'] ?></div>
												</td>
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
