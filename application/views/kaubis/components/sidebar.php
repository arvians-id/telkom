<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url('kaubis') ?>">Kepala Unit Bisnis</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('kaubis') ?>">KUB</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Home</li>
			<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-tachometer-alt"></i> <span>Beranda Utama</span></a></li>
			<li <?= activeClassMenu(['']) ?>><a class="nav-link" href="<?= base_url('kaubis') ?>"><i class="fas fa-fire"></i> <span>Beranda Kaubis</span></a></li>
			<li class="menu-header">Menus</li>
			<li class="nav-item dropdown <?= activeMenu(['persetujuan', 'data_pelanggan', 'ubah_pelanggan']) ?>">
				<a href="javascript:void(0);" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i><span>Kelola Pelanggan</span></a>
				<ul class="dropdown-menu">
					<li <?= activeClassMenu(['persetujuan']) ?>><a class="nav-link" href="<?= base_url('kaubis/persetujuan') ?>">Persetujuan Pelanggan</a></li>
					<li <?= activeClassMenu(['data_pelanggan', 'ubah_pelanggan']) ?>><a class="nav-link" href="<?= base_url('kaubis/data_pelanggan') ?>">Data</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown <?= activeMenu(['data_kaubis', 'data_tleader', 'input_user']) ?>">
				<a href="javascript:void(0);" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-tie"></i> <span>Kelola Users</span></a>
				<ul class="dropdown-menu">
					<li <?= activeClassMenu(['data_kaubis']) ?>><a class="nav-link" href="<?= base_url('kaubis/data_kaubis') ?>">Kaubis</a></li>
					<li <?= activeClassMenu(['data_tleader']) ?>><a class="nav-link" href="<?= base_url('kaubis/data_tleader') ?>">Team Leader</a></li>
					<li <?= activeClassMenu(['input_user']) ?>><a class="nav-link" href="<?= base_url('kaubis/input_user') ?>">Input User</a></li>
				</ul>
			</li>
			<li <?= activeClassMenu(['profil']) ?>><a class="nav-link" href="<?= base_url('kaubis/profil') ?>"><i class="fas fa-address-card"></i> <span>Profil</span></a></li>
			<li <?= activeClassMenu(['laporan']) ?>><a class="nav-link" href="<?= base_url('kaubis/laporan') ?>"><i class="fas fa-file-archive"></i> <span>Laporan</span></a></li>
		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="<?= base_url('login/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-sign-out-alt"></i> Logout
			</a>
		</div>
	</aside>
</div>
