<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Laporan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('kaubis') ?>">Kaubis</a></div>
				<div class="breadcrumb-item active">Kelola Laporan</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Laporan</h2>
			<p class="section-lead">
				Pada halaman ini anda dapat melakukan export laporan berbentuk Ms Excel
			</p>
			<div class="card">
				<div class="card-header">
					<h4>Laporan</h4>
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
					<form method="POST" enctype="multipart/form-data">
						<div class="row justify-content-center">
							<div class="col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label>Dari</label><small class="text-danger"> *</small>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-signature"></i>
											</div>
										</div>
										<input type="date" name="awal" class="form-control <?= form_error('awal') ? 'is-invalid' : '' ?>" value="<?= set_value('awal') ?>">
										<div class="invalid-feedback"><?= form_error('awal') ?></div>
									</div>
								</div>
								<div class="form-group">
									<label>Sampai</label><small class="text-danger"> *</small>
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fas fa-signature"></i>
											</div>
										</div>
										<input type="date" name="akhir" class="form-control <?= form_error('akhir') ? 'is-invalid' : '' ?>" value="<?= set_value('akhir') ?>">
										<div class="invalid-feedback"><?= form_error('akhir') ?></div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
