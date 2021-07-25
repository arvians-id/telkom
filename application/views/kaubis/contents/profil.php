<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Profil</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Kaubis</a></div>
				<div class="breadcrumb-item active">Kelola Profil</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Profil</h2>
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-5">
					<div class="card profile-widget">
						<div class="profile-widget-header">
							<img alt="image" src="<?= base_url('assets/images/' . $profil['photo']) ?>" class="rounded-circle profile-widget-picture" width="100" height="100">
							<div class="profile-widget-items">
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Username</div>
									<div class="profile-widget-item-value"><?= ucfirst($profil['username']) ?></div>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Role</div>
									<div class="profile-widget-item-value"><?= $profil['role'] ?></div>
								</div>
							</div>
						</div>
						<div class="profile-widget-description">
							<div class="profile-widget-name"><?= ucfirst($profil['username']) ?> <div class="text-muted d-inline font-weight-normal">
									<div class="slash"></div> <?= ucfirst($profil['role']) ?>
								</div>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th>Username</th>
										<td><?= $profil['username'] ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?= $profil['email'] ?></td>
									</tr>
									<tr>
										<th>Full Name</th>
										<td><?= $profil['nama_lengkap'] ?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?= $profil['no_hp'] ?></td>
									</tr>
									<tr>
										<th>alamat</th>
										<td><?= $profil['alamat'] ?></td>
									</tr>
								</thead>
							</table>
							<h4>Bio</h4>
							<?= $profil['bio'] ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-7">
					<div class="card">
						<form method="post" enctype="multipart/form-data">
							<div class="card-header">
								<h4>Edit Profile</h4>
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
								<div class="row">
									<div class="col-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" value="<?= set_value('username', $profil['username']) ?>" readonly>
										</div>
										<div class="form-group">
											<label>Email</label><small class="text-danger"> *</small>
											<input type="text" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" value="<?= set_value('email', $profil['email']) ?>">
											<div class="invalid-feedback"><?= form_error('email') ?></div>
										</div>
										<div class="form-group">
											<label>Nama Lengkap</label><small class="text-danger"> *</small>
											<input type="text" name="nama_lengkap" class="form-control <?= form_error('nama_lengkap') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_lengkap', $profil['nama_lengkap']) ?>">
											<div class="invalid-feedback"><?= form_error('nama_lengkap') ?></div>
										</div>
									</div>
									<div class="col-12 col-md-6 col-lg-6">
										<div class="form-group">
											<label>No Handphone</label><small class="text-danger"> *</small>
											<input type="text" name="no_hp" class="form-control <?= form_error('no_hp') ? 'is-invalid' : '' ?>" value="<?= set_value('no_hp', $profil['no_hp']) ?>">
											<div class="invalid-feedback"><?= form_error('no_hp') ?></div>
										</div>
										<div class="form-group">
											<label>Alamat</label><small class="text-danger"> *</small>
											<input type="text" name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" value="<?= set_value('alamat', $profil['alamat']) ?>">
											<div class="invalid-feedback"><?= form_error('alamat') ?></div>
										</div>
										<div class="form-group">
											<label>Photo</label> <small class="text-primary">* Kosongkan jika tidak ingin diubah</small>
											<input type="file" name="photo" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12">
										<label>Password</label> <small class="text-primary">* Kosongkan jika tidak ingin diubah</small>
										<input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>">
										<div class="invalid-feedback"><?= form_error('password') ?></div>
									</div>
									<div class="form-group col-12">
										<label>Bio</label>
										<textarea style="height: 150px;" name="bio" class="form-control <?= form_error('bio') ? 'is-invalid' : '' ?>"><?= $profil['bio'] ?></textarea>
										<div class="invalid-feedback"><?= form_error('bio') ?></div>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button class="btn btn-primary">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
