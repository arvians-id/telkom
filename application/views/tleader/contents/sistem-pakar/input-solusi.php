<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Solusi</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_solusi') ?>">Kelola Solusi</a></div>
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
		<h2 class="section-title">Input Solusi</h2>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Input Solusi</h4>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group">
							<label>Kode Solusi</label><small class="text-danger"> *</small>
							<input type="text" name="kode_solusi" class="form-control <?= form_error('kode_solusi') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_solusi') ?>">
							<div class="invalid-feedback"><?= form_error('kode_solusi') ?></div>
						</div>
						<div class="form-group">
							<label>Judul Solusi</label><small class="text-danger"> *</small>
							<input type="text" name="judul" class="form-control <?= form_error('judul') ? 'is-invalid' : '' ?>" value="<?= set_value('judul') ?>">
							<div class="invalid-feedback"><?= form_error('judul') ?></div>
						</div>
						<div class="form-group">
							<label>Solusi</label><small class="text-danger"> *</small>
							<textarea name="solusi" class="summernote"><?= set_value('solusi') ?></textarea>
							<div class="invalid-feedback"><?= form_error('solusi') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
