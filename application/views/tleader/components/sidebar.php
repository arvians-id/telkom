<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url('tleader') ?>">Team Leader</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url('tleader') ?>">Tl</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Home</li>
			<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-tachometer-alt"></i> <span>Beranda Utama</span></a></li>
			<li <?= activeClassMenu(['']) ?>><a class="nav-link" href="<?= base_url('tleader') ?>"><i class="fas fa-fire"></i> <span>Beranda Team Leader</span></a></li>
			<li class="menu-header">Menus</li>
			<li class="nav-item dropdown <?= activeMenu(['data_pelanggan', 'input_pelanggan', 'ubah_pelanggan']) ?>">
				<a href="javascript:void(0);" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Kelola Pelanggan</span></a>
				<ul class="dropdown-menu">
					<li <?= activeClassMenu(['data_pelanggan', 'ubah_pelanggan']) ?>><a class="nav-link" href="<?= base_url('tleader/data_pelanggan') ?>">Data</a></li>
					<li <?= activeClassMenu(['input_pelanggan']) ?>><a class="nav-link" href="<?= base_url('tleader/input_pelanggan') ?>">Input</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown <?= activeMenu(['data_riwayat', 'data_gejala', 'data_solusi', 'data_rules', 'data_modem', 'ubah_riwayat', 'ubah_gejala', 'ubah_solusi', 'ubah_rules', 'ubah_modem', 'input_rules', 'input_solusi', 'detail_riwayat']) ?>">
				<a href="javascript:void(0);" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Keluhan Pelanggan</span></a>
				<ul class="dropdown-menu">
					<li <?= activeClassMenu(['data_riwayat', 'ubah_riwayat', 'detail_riwayat']) ?>><a class="nav-link" href="<?= base_url('tleader/data_riwayat') ?>">Data Riwayat</a></li>
					<li <?= activeClassMenu(['data_gejala', 'ubah_gejala']) ?>><a class="nav-link" href="<?= base_url('tleader/data_gejala') ?>">Data Gejala</a></li>
					<li <?= activeClassMenu(['data_solusi', 'ubah_solusi', 'input_solusi']) ?>><a class="nav-link" href="<?= base_url('tleader/data_solusi') ?>">Data Solusi</a></li>
					<li <?= activeClassMenu(['data_rules', 'ubah_rules', 'input_rules']) ?>><a class="nav-link" href="<?= base_url('tleader/data_rules') ?>">Data Rules</a></li>
					<li <?= activeClassMenu(['data_modem', 'ubah_modem']) ?>><a class="nav-link" href="<?= base_url('tleader/data_modem') ?>">Data Modem</a></li>
				</ul>
			</li>
			<li <?= activeClassMenu(['profil']) ?>><a class="nav-link" href="<?= base_url('tleader/profil') ?>"><i class="fas fa-address-card"></i> <span>Profil</span></a></li>
		</ul>
		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="<?= base_url('login/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-sign-out-alt"></i> Logout
			</a>
		</div>
	</aside>
</div>
