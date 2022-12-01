<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Modem</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_modem') ?>">Kelola Modem</a></div>
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
		<h2 class="section-title">Ubah Modem</h2>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Ubah Modem</h4>
				</div>
				<div class="card-body">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label>Kode Modem</label>
							<input type="text" class="form-control" value="<?= $getModem["kode_modem"] ?>" readonly>
						</div>
						<div class="form-group">
							<label>Type Modem</label><small class="text-danger"> *</small>
							<input type="text" name="type_modem" class="form-control <?= form_error('type_modem') ? 'is-invalid' : '' ?>" value="<?= set_value('type_modem', $getModem["type_modem"]) ?>">
							<div class="invalid-feedback"><?= form_error('type_modem') ?></div>
						</div>
						<div class="form-group">
							<label>Nama Modem</label><small class="text-danger"> *</small>
							<input type="text" name="modem" class="form-control <?= form_error('modem') ? 'is-invalid' : '' ?>" value="<?= set_value('modem', $getModem["modem"]) ?>">
							<div class="invalid-feedback"><?= form_error('modem') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
