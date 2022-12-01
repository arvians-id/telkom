<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Gejala</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_gejala') ?>">Kelola Gejala</a></div>
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
		<h2 class="section-title">Input Gejala</h2>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Input Gejala</h4>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kode Gejala</label><small class="text-danger"> *</small>
							<input type="text" name="kode_gejala" class="form-control <?= form_error('kode_gejala') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_gejala') ?>">
							<div class="invalid-feedback"><?= form_error('kode_gejala') ?></div>
						</div>
						<div class="form-group">
							<label>Nama Gejala</label><small class="text-danger"> *</small>
							<input type="text" name="gejala" class="form-control <?= form_error('gejala') ? 'is-invalid' : '' ?>" value="<?= set_value('gejala') ?>">
							<div class="invalid-feedback"><?= form_error('gejala') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
		<h2 class="section-title">Data Gejala</h2>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Gejala</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Kode Gejala</th>
											<th>Nama Gejala</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getGejala as $gejala) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $gejala['kode_gejala'] ?>
													<br>
													<a href="<?= base_url('tleader/ubah_gejala/' . $gejala['kode_gejala']) ?>">Ubah</a> |
													<a href="<?= base_url('tleader/hapus_gejala/' . $gejala['kode_gejala']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
												</td>
												<td><?= $gejala['gejala'] ?></td>
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
