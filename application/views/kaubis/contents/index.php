<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Beranda</h1>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pelanggan</h4>
						</div>
						<div class="card-body">
							<?= $countPelanggan ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-exclamation-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Kendala)</h4>
						</div>
						<div class="card-body">
							<?= $countKendala ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-spinner"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (On Progress)</h4>
						</div>
						<div class="card-body">
							<?= $countOnProgress ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="far fa-check-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Pelanggan (Done)</h4>
						</div>
						<div class="card-body">
							<?= $countDone ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-info">
						<i class="fas fa-user-slash"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Cabut</h4>
						</div>
						<div class="card-body">
							<?= $countCabut ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-secondary">
						<i class="fas fa-user-lock"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Putus Sementara</h4>
						</div>
						<div class="card-body">
							<?= $countPutus ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-body">
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
