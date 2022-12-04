<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
	<a href="<?= base_url() ?>" class="navbar-brand sidebar-gone-hide">PT Telkom Indonesia</a>
	<div class="navbar-nav">
		<a href="<?= base_url() ?>" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
	</div>
	<?php if ($this->session->userdata('username')) : ?>
		<ul class="navbar-nav navbar-right ml-auto">
			<li class="dropdown"><a href="javascript:void(0);" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
					<img alt="image" src="<?= base_url('assets/images/' . $this->session->userdata('photo')) ?>" class="rounded-circle mr-1" height="30">
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
			<li class="nav-item <?= activeMenu(['']) ?>">
				<a href="<?= base_url() ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
			</li>
			<li class="nav-item <?= activeMenu(['sejarah']) ?>">
				<a href="<?= base_url('home/sejarah') ?>" class="nav-link"><i class="fas fa-book-reader"></i><span>Sejarah PT Telkom</span></a>
			</li>
			<li class="nav-item <?= activeMenu(['keluhan', 'result']) ?>">
				<a href="<?= base_url('home/keluhan') ?>" class="nav-link"><i class="fa fa-user"></i><span>Keluhan Pelanggan</span></a>
			</li>
		</ul>
	</div>
</nav>
