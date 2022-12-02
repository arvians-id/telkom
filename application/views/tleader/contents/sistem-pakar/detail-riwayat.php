<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Riwayat</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item active">Kelola Riwayat</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Riwayat</h2>
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-5">
					<div class="card profile-widget mt-0">
						<div class="profile-widget-header">
							<div class="profile-widget-items">
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Nama</div>
									<div class="profile-widget-item-value"><?= ucfirst($getRiwayat['nama']) ?></div>
								</div>
								<div class="profile-widget-item">
									<div class="profile-widget-item-label">Kode Pelanggan</div>
									<div class="profile-widget-item-value"><?= $getRiwayat['kode_pelanggan'] ?></div>
								</div>
							</div>
						</div>
						<div class="profile-widget-description">
							<table class="table table-responsive">
								<thead>
									<tr>
										<th>Email</th>
										<td><?= $getRiwayat['email'] ?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?= $getRiwayat['no_hp'] ?></td>
									</tr>
									<tr>
										<th>Alamat</th>
										<td><?= $getRiwayat['alamat'] ?></td>
									</tr>
									<tr>
										<th>Kode Modem</th>
										<td><?= $getRiwayat['kode_modem'] ?></td>
									</tr>
									<tr>
										<th>Tipe Modem</th>
										<td><?= $getRiwayat['type_modem'] ?></td>
									</tr>
									<tr>
										<th>Nama Modem</th>
										<td><?= $getRiwayat['modem'] ?></td>
									</tr>
									<tr>
										<th>Tanggal Keluhan</th>
										<td><?= $getRiwayat['created_at'] ?></td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-7">
					<div class="card">
						<div class="card-header">
							<h4>Keluhan Pelanggan</h4>
						</div>
						<div class="card-body">
							<h5>Gejala/Keluhan Pelanggan</h5>
							<?php if ($getJawaban != null) : ?>
								<ol>
									<?php for ($i = 0; $i < count($getJawaban); $i++) : ?>
										<?php if ($getJawaban[$i] != null) : ?>
											<li><?= $getJawaban[$i]['kode_gejala'] . " - " . $getJawaban[$i]['gejala']  ?></li>
										<?php else : ?>
											<li class="text-danger">Gejala tidak ditemukan di database</li>
										<?php endif; ?>
									<?php endfor; ?>
								</ol>
							<?php else : ?>
								Gejala atau keluhan tidak ditemukan
							<?php endif; ?>
							<h5>Solusi yang Diberikan</h5>
							<p class="mb-0">Kode Solusi : <?= $getSolusi['kode_solusi'] . " - " . $getSolusi['judul'] ?></p>
							<?= $getSolusi == null ? 'Solusi tidak ditemukan' : $getSolusi['solusi'] ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	const inputPhoto = document.querySelector('[name="photo"]');
	inputPhoto.addEventListener('change', function(event) {
		let file = event.target.files[0];
		let src = URL.createObjectURL(file);
		document.querySelector('#preview-img').setAttribute('src', src);
	})
	const inputPassword = document.querySelector('[name="password"]');
	// Show Hide Password
	const resetPassword = () => {
		inputPassword.setAttribute('type', 'password');
		document.querySelector('#showPassword').innerHTML = 'Lihat Password';
	}
	const showPassword = (show, idPassword) => {
		if (idPassword.getAttribute('type') == 'password') {
			idPassword.setAttribute('type', 'text');
			show.innerHTML = 'Tutup Password';
		} else {
			idPassword.setAttribute('type', 'password');
			show.innerHTML = 'Lihat Password';
		}
	}
	document.querySelector('#showPassword').addEventListener('click', function() {
		showPassword(this, inputPassword);
	})
</script>
