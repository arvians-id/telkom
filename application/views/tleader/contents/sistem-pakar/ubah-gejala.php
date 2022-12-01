<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Gejala</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_gejala') ?>">Kelola Gejala</a></div>
				<div class="breadcrumb-item active">Ubah</div>
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
		<h2 class="section-title">Ubah Gejala</h2>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Ubah Gejala</h4>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kode Gejala</label>
							<input type="text" class="form-control" value="<?= $getGejala["kode_gejala"] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Gejala</label><small class="text-danger"> *</small>
							<input type="text" name="gejala" class="form-control <?= form_error('gejala') ? 'is-invalid' : '' ?>" value="<?= set_value('gejala', $getGejala["gejala"]) ?>">
							<div class="invalid-feedback"><?= form_error('gejala') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
