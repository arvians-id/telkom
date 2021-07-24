<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Persetujuan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/data_pelanggan') ?>">Kelola Persetujuan</a></div>
				<div class="breadcrumb-item active">Data</div>
			</div>
		</div>
		<h2 class="section-title">Persetujuan</h2>
		<p class="section-lead">
			Halaman ini berisi data pelanggan dalam status (On Progress)
		</p>
		<div class="row">
			<div class="col-12">
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
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Persetujuan Pelanggan</h4>
							<a href="<?= base_url('kaubis/input_pelanggan') ?>" class="btn btn-primary ml-auto"><i class="fas fa-plus-circle"></i> Tambah Pelanggan</a>
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
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>ID Pelanggan - Nama</th>
											<th>No Handphone</th>
											<th>Paket</th>
											<th class="text-center">Photo</th>
											<th class="text-center"></th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getPelanggan as $pelanggan) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $pelanggan['kode_pelanggan'] . ' - ' . $pelanggan['nama'] ?>
													<br>
													<a href="<?= base_url('kaubis/ubah_pelanggan/' . $pelanggan['id_pelanggan']) ?>">Edit</a>
												</td>
												<td><?= $pelanggan['no_hp'] ?></td>
												<td><?= $pelanggan['paket'] ?></td>
												<td class="text-center">
													<a href="javascript:void(0);" class="ktp" data-ktp="<?= $pelanggan['photo_ktp'] ?>">KTP</a> | <a href="javascript:void(0);" class="selfie" data-selfie="<?= $pelanggan['photo_selfie'] ?>">Selfie</a>
												</td>
												<td class="text-center">
													<div class="dropdown">
														<a class="btn btn-primary p-0 px-2 rounded-pill shadow-none" href="javascript:void(0);" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Aksi
														</a>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
															<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/2/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Done) ?')">Done</a>
															<a class="dropdown-item" href="<?= base_url('kaubis/ubah_status/1/' . $pelanggan['id_pelanggan']) ?>" onclick="return confirm('Yakin ingin merubah status pelanggan ini menjadi (Kendala) ?')">Kendala</a>
														</div>
													</div>
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
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<img src="" id="image" class="img-fluid">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
