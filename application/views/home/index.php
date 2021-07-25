<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= $judul ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/components.css">
</head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="index.html" class="navbar-brand sidebar-gone-hide">Telkom Indonesia</a>
				<div class="navbar-nav">
					<a href="<?= base_url() ?>" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
				</div>
				<?php if ($this->session->userdata('username')) : ?>
					<ul class="navbar-nav navbar-right ml-auto">
						<li class="dropdown"><a href="javascript:void(0);" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
								<img alt="image" src="<?= base_url('assets/template/stisla') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
								<div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($this->session->userdata('username')) ?></div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="<?= $this->session->userdata('role') == 'kaubis' ? base_url('kaubis/profil') : base_url('tleader/profil')  ?>" class="dropdown-item has-icon">
									<i class="far fa-user"></i> Profile
								</a>
								<div class="dropdown-divider"></div>
								<a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger">
									<i class="fas fa-sign-out-alt"></i> Logout
								</a>
							</div>
						</li>
					</ul>
				<?php else : ?>
					<ul class="navbar-nav navbar-right ml-auto">
						<li><a href="<?= base_url('login') ?>" class="nav-link">
								<div class="d-sm-none d-lg-inline-block">Login</div>
							</a>
						</li>
					</ul>
				<?php endif ?>
			</nav>

			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a href="<?= base_url() ?>" class="nav-link"><i class="fas fa-igloo"></i><span>Home</span></a>
						</li>
					</ul>
				</div>
			</nav>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<img src="<?= base_url('assets/layout/telkom.png') ?>" alt="logo" width="80" class="rounded-circle">
						<h1>Telkom Indonesia</h1>
					</div>

					<div class="section-body">
						<h2 class="section-title">This is Example Page</h2>
						<p class="section-lead">This page is just an example for you to create your own page.</p>
						<div class="card">
							<div class="card-header">
								<h4>Example Card</h4>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<div class="card-footer bg-whitesmoke">
								This is card footer
							</div>
						</div>
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/custom.js"></script>
</body>

</html>
