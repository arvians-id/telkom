<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
	<form class="form-inline mr-auto">
		<ul class="navbar-nav mr-3">
			<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
		</ul>
	</form>
	<ul class="navbar-nav navbar-right ml-auto">
		<li class="dropdown"><a href="javascript:void(0);" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
				<img alt="image" src="<?= base_url('assets/images/' . $this->session->userdata('photo')) ?>" class="rounded-circle mr-1" height="30">
				<div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($this->session->userdata('username')) ?></div>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="<?= base_url('kaubis/profil') ?>" class="dropdown-item has-icon">
					<i class="far fa-user"></i> Profile
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('login/logout') ?>" class="dropdown-item has-icon text-danger">
					<i class="fas fa-sign-out-alt"></i> Logout
				</a>
			</div>
		</li>
	</ul>
</nav>
