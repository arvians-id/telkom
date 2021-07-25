<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Input Users</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis/input_user') ?>">Kelola Users</a></div>
				<div class="breadcrumb-item active">Input User</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Input Users</h2>

			<div class="card">
				<div class="card-header">
					<h4>Input Users</h4>
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
									<label>Username</label><small class="text-danger"> *</small>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-signature"></i>
											</div>
										</div>
										<input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" value="<?= set_value('username') ?>">
										<div class="invalid-feedback"><?= form_error('username') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Password</label><small class="text-danger"> *</small>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-key"></i>
											</div>
										</div>
										<input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>">
										<div class="invalid-feedback"><?= form_error('password') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label><small class="text-danger"> *</small>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-signature"></i>
											</div>
										</div>
										<input type="text" name="nama_lengkap" class="form-control <?= form_error('nama_lengkap') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_lengkap') ?>">
										<div class="invalid-feedback"><?= form_error('nama_lengkap') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Email</label><small class="text-danger"> *</small>
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
									<label>Alamat</label><small class="text-danger"> *</small>
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
									<label>No Handphone</label><small class="text-danger"> *</small>
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
									<label>Role</label><small class="text-danger"> *</small>
									<select name="role" class="form-control <?= form_error('role') ? 'is-invalid' : '' ?>">
										<option value="" selected disabled>Pilih...</option>
										<option value="kaubis" <?= set_value('role') == 'kaubis' ? 'selected' : '' ?>>Kaubis</option>
										<option value="tleader" <?= set_value('role') == 'tleader' ? 'selected' : '' ?>>Team Leader</option>
									</select>
									<div class="invalid-feedback"><?= form_error('role') ?></div>
								</div>
								<div class="form-group">
									<label>Photo</label>
									<input type="file" name="photo" class="form-control">
								</div>
								<div class="form-group">
									<label>Bio</label>
									<textarea style="height: 140px;" name="bio" class="form-control"><?= set_value('bio') ?></textarea>
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
