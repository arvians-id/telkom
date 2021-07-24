<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Pelanggan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/data_pelanggan') ?>">Kelola Pelanggan</a></div>
				<div class="breadcrumb-item active">Input</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Input Pelanggan</h2>

			<div class="card">
				<div class="card-header">
					<h4>Input Pelanggan</h4>
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
					<form method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label>ID/Kode Pelanggan</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<a href="javascript:void(0);" style="text-decoration:none" class="shadow-sm" id="generate-id">
												<div class="input-group-text">
													Generate ID
												</div>
											</a>
										</div>
										<input type="text" name="kode_pelanggan" class="form-control <?= form_error('kode_pelanggan') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_pelanggan') ?>" readonly>
										<div class="invalid-feedback"><?= form_error('kode_pelanggan') ?></div>
									</div>

								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-signature"></i>
											</div>
										</div>
										<input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" value="<?= set_value('nama') ?>">
										<div class="invalid-feedback"><?= form_error('nama') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Email</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-envelope"></i>
											</div>
										</div>
										<input type="text" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" value="<?= set_value('email') ?>">
										<div class="invalid-feedback"><?= form_error('email') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-map-marked-alt"></i>
											</div>
										</div>
										<input type="text" name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" value="<?= set_value('alamat') ?>">
										<div class="invalid-feedback"><?= form_error('alamat') ?></div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label>No Handphone</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-phone"></i>
											</div>
										</div>
										<input type="text" name="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= set_value('no_hp') ?>">
										<div class="invalid-feedback"><?= form_error('no_hp') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Paket</label>
									<select name="paket" class="form-control <?= form_error('paket') ? 'is-invalid' : '' ?>">
										<option value="" selected disabled>Pilih Paket ...</option>
										<?php foreach ($getPaket as $paket) : ?>
											<option value="<?= $paket['id_paket'] ?>" <?= set_value('paket') == $paket['id_paket'] ? 'selected' : '' ?>><?= $paket['paket'] ?></option>
										<?php endforeach ?>
									</select>
									<div class="invalid-feedback"><?= form_error('paket') ?></div>
								</div>
								<div class="form-group">
									<label>Photo KTP</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-address-card"></i>
											</div>
										</div>
										<input type="file" name="photo_ktp" class="form-control <?= form_error('photo_ktp') ? 'is-invalid' : '' ?>" value="<?= set_value('photo_ktp') ?>">
										<div class="invalid-feedback"><?= form_error('photo_ktp') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Photo Selfie</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-camera-retro"></i>
											</div>
										</div>
										<input type="file" name="photo_selfie" class="form-control <?= form_error('photo_selfie') ? 'is-invalid' : '' ?>" value="<?= set_value('photo_selfie') ?>">
										<div class="invalid-feedback"><?= form_error('photo_selfie') ?></div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
