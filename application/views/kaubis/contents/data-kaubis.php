<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Kaubis</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Kaubis</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/data_kaubis') ?>">Kelola Users</a></div>
				<div class="breadcrumb-item active">Kaubis</div>
			</div>
		</div>
		<h2 class="section-title">Kaubis</h2>
		<div class="row">
			<div class="col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-user-tie"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Kaubis</h4>
						</div>
						<div class="card-body">
							<?= $countKaubis ?>
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
							<h4>Data Kaubis</h4>
							<a href="<?= base_url('kaubis/input_user') ?>" class="btn btn-primary ml-auto"><i class="fas fa-plus-circle"></i> Tambah Kaubis</a>
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
											<th>Username</th>
											<th>Nama Lengkap</th>
											<th>Email</th>
											<th>No Handphone</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getKaubis as $kaubis) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $kaubis['username'] ?>
													<br>
													<a href="<?= base_url('kaubis/data_kaubis/' . $kaubis['id']) ?>">Detail</a>
													<?php if ($this->session->userdata('id') != $kaubis['id']) : ?>
														|
														<a href="<?= base_url('kaubis/hapus_user/' . $kaubis['id']) ?>" onclick="return confirm('Yakin ingin menghapus pengguna Kaubis ini ?')">Hapus</a>
													<?php endif ?>
												</td>
												<td><?= $kaubis['nama_lengkap'] ?></td>
												<td><?= $kaubis['email'] ?></td>
												<td><?= $kaubis['no_hp'] ?></td>
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
