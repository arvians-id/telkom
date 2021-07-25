<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Team Leader</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Kaubis</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/data_tleader') ?>">Kelola Users</a></div>
				<div class="breadcrumb-item active">Team Leader</div>
			</div>
		</div>
		<h2 class="section-title">Team Leader</h2>
		<div class="row">
			<div class="col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Team Leader</h4>
						</div>
						<div class="card-body">
							<?= $countTleader ?>
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
							<h4>Data Team Leader</h4>
							<a href="<?= base_url('kaubis/input_user') ?>" class="btn btn-primary ml-auto"><i class="fas fa-plus-circle"></i> Tambah Team Leader</a>
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
										foreach ($getTleader as $tleader) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $tleader['username'] ?>
													<br>
													<a href="<?= base_url('kaubis/data_tleader/' . $tleader['id']) ?>">Detail</a> |
													<a href="<?= base_url('kaubis/hapus_user/' . $tleader['id']) ?>" onclick="return confirm('Yakin ingin menghapus pengguna Team Leader ini ?')">Hapus</a>
												</td>
												<td><?= $tleader['nama_lengkap'] ?></td>
												<td><?= $tleader['email'] ?></td>
												<td><?= $tleader['no_hp'] ?></td>
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
