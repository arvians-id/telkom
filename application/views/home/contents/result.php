<div class="main-content">
	<section class="section">
		<div class="section-header">
			<img src="<?= base_url('assets/layout/telkom.png') ?>" alt="logo" width="80" class="rounded-circle">
			<h1>Telkom Akses</h1>
		</div>
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
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Hasil Pengaduan/Keluhan</h4>
					<div class="card-header-action">
						<a data-collapse="#hasil-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
					</div>
				</div>
				<div class="collapse show" id="hasil-collapse">
					<div class="card-body text-center">
						<?php if ($getSolusi != "Kode solusi tidak ditemukan") : ?>
							<p>Adapun solusinya, sebagai berikut.</p>
							<h5><?= $getSolusi['judul'] ?></h5>
							<h6><?= $getSolusi['solusi'] ?></h6>
						<?php else : ?>
							<p>Maaf, solusi tidak ditemukan.</p>
						<?php endif; ?>
						<a href="<?= base_url() ?>home/keluhan" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Konsultasi ulang</a>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h4>Riwayat Pertanyaan</h4>
					<div class="card-header-action">
						<a data-collapse="#riwayat-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
					</div>
				</div>
				<div class="collapse show" id="riwayat-collapse">
					<div class="card-body">
						<ul class="list-group">
							<?php if ($getJawaban != null) : ?>
								<?php for ($i = 0; $i < count($getJawaban); $i++) : ?>
									<?php if ($getJawaban[$i] != null) : ?>
										<li class="list-group-item"><?= $getJawaban[$i]['kode_gejala'] . " - " . $getJawaban[$i]['gejala']  ?> - <b class="text-success">Ya</b></li>
									<?php else : ?>
										<li class="list-group-item">Gejala tidak ditemukan di database</li>
									<?php endif; ?>
								<?php endfor; ?>
							<?php else : ?>
								Gejala atau keluhan tidak ditemukan
							<?php endif; ?>
							<?php foreach ($getFalseGejala as $falseGejala) : ?>
								<li class="list-group-item"><?= $falseGejala['kode_gejala'] . " - " . $falseGejala['gejala']  ?> - <b class="text-danger">Tidak</b></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>