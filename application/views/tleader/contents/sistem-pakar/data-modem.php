<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Modem</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_modem') ?>">Kelola Modem</a></div>
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
		<h2 class="section-title">Input Modem</h2>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Input Modem</h4>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kode Modem</label><small class="text-danger"> *</small>
							<input type="text" name="kode_modem" class="form-control <?= form_error('kode_modem') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_modem') ?>">
							<div class="invalid-feedback"><?= form_error('kode_modem') ?></div>
						</div>
						<div class="form-group">
							<label>Type Modem</label><small class="text-danger"> *</small>
							<input type="text" name="type_modem" class="form-control <?= form_error('type_modem') ? 'is-invalid' : '' ?>" value="<?= set_value('type_modem') ?>">
							<div class="invalid-feedback"><?= form_error('type_modem') ?></div>
						</div>
						<div class="form-group">
							<label>Nama Modem</label><small class="text-danger"> *</small>
							<input type="text" name="modem" class="form-control <?= form_error('modem') ? 'is-invalid' : '' ?>" value="<?= set_value('modem') ?>">
							<div class="invalid-feedback"><?= form_error('modem') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
		<h2 class="section-title">Data Modem</h2>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Modem</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Kode Modem</th>
											<th>Type Modem</th>
											<th>Nama Modem</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getModem as $modem) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $modem['kode_modem'] ?>
													<br>
													<a href="<?= base_url('tleader/ubah_modem/' . $modem['kode_modem']) ?>">Ubah</a> |
													<a href="<?= base_url('tleader/hapus_modem/' . $modem['kode_modem']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
												</td>
												<td><?= $modem['type_modem'] ?></td>
												<td><?= $modem['modem'] ?></td>
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
