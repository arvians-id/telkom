<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Rules</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_pelanggan') ?>">Kelola Rules</a></div>
				<div class="breadcrumb-item active">Input</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Input Rules</h2>
			<div class="card">
				<div class="card-header">
					<h4>Input Rules</h4>
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
					<form method="POST">
						<div class="form-group">
							<label>Kode Rules</label><small class="text-danger"> *</small>
							<input type="text" name="kode_rules" class="form-control <?= form_error('kode_rules') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_rules') ?>">
							<div class="invalid-feedback"><?= form_error('kode_rules') ?></div>
						</div>
						<div class="form-group">
							<label>Kode Solusi</label><small class="text-danger"> *</small>
							<select name="kode_solusi_rules" class="form-control <?= form_error('kode_solusi_rules') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih Solusi ...</option>
								<?php foreach ($getSolusi as $solusi) : ?>
									<option value="<?= $solusi['kode_solusi'] ?>" <?= set_value('kode_solusi_rules') == $solusi['kode_solusi'] ? 'selected' : '' ?>><?= $solusi['kode_solusi'] ?> - <?= $solusi['solusi'] ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('kode_solusi_rules') ?></div>
						</div>
						<div class="form-group">
							<label>Kode Gejala</label><small class="text-danger"> *</small>
							<select name="kode_gejala_rules[]" class="form-control select2 <?= form_error('kode_gejala_rules') ? 'is-invalid' : '' ?>" multiple>
								<?php foreach ($getGejala as $gejala) : ?>
									<option value="<?= $gejala['kode_gejala'] ?>"><?= $gejala['kode_gejala'] ?> - <?= $gejala['gejala'] ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('kode_gejala_rules') ?></div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
