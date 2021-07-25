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
							<img alt="image" src="<?= base_url('assets/images/' . $user['photo']) ?>" class="rounded-circle profile-widget-picture" width="100" height="100">
							<div class="profile-widget-items">
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Username</div>
									<div class="profile-widget-item-value"><?= ucfirst($user['username']) ?></div>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Role</div>
									<div class="profile-widget-item-value"><?= $user['role'] ?></div>
								</div>
							</div>
						</div>
						<div class="profile-widget-description">
							<div class="profile-widget-name"><?= ucfirst($user['username']) ?> <div class="text-muted d-inline font-weight-normal">
									<div class="slash"></div> <?= ucfirst($user['role']) ?>
								</div>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th>Username</th>
										<td><?= $user['username'] ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?= $user['email'] ?></td>
									</tr>
									<tr>
										<th>Full Name</th>
										<td><?= $user['nama_lengkap'] ?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?= $user['no_hp'] ?></td>
									</tr>
									<tr>
										<th>alamat</th>
										<td><?= $user['alamat'] ?></td>
									</tr>
								</thead>
							</table>
							<h4>Bio</h4>
							<?= $user['bio'] ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
