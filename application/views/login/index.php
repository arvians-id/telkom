<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= $judul ?></title>
	<link rel="icon" href="<?= base_url('assets/layout/telkom.png') ?>" type="image">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/node_modules/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="d-flex flex-wrap align-items-stretch">
				<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
					<div class="p-4 m-3">
						<img src="<?= base_url('assets/layout/telkom.png') ?>" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
						<h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Telkom Akses Bandung</span></h4>
						<p class="text-muted">Before you get started, you must login.</p>
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
								<label for="username">Username</label>
								<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" name="username" value="<?= set_value('username') ?>" autofocus>
								<div class="invalid-feedback"><?= form_error('username') ?></div>
							</div>

							<div class="form-group">
								<div class="d-block">
									<label for="password" class="control-label">Password</label>
								</div>
								<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" name="password">
								<div class="invalid-feedback"><?= form_error('password') ?></div>
								<small type="button" id="showPassword" class="d-block" style="cursor: pointer">Lihat Password</small>
							</div>

							<div class="form-group text-right">
								<a href="<?= base_url() ?>" class="d-inline mr-2"><i class="fas fa-arrow-left"></i> Kembali ke beranda </a>
								<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
									Login
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/template/stisla') ?>/assets/img/unsplash/login-bg.jpg">
					<div class="absolute-bottom-left index-2">
						<div class="text-light p-5 pb-2">
							<div class="mb-5 pb-3">
								<img src="<?= base_url('assets/layout/telkom.png') ?>" alt="logo" width="80">
								<h1 class="mb-2 display-4 font-weight-bold">Telkom Akses</h1>
								<h5 class="font-weight-normal text-muted-transparent">Bandung, Indonesia</h5>
							</div>
							Telkom Sadang Serang, Jl Sadang Serang no 42
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script>
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

</body>

</html>
