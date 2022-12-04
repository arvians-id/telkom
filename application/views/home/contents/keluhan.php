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
		<?php elseif ($this->session->flashdata('error') || form_error('jawaban[]')) : ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?php if (form_error('jawaban[]')) : ?>
					<?= form_error('jawaban[]') ?>
				<?php else : ?>
					<?= $this->session->flashdata('error'); ?>
				<?php endif; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<div class="section-body">
			<div class="card">
				<div class="card-header">
					<h4>Form Keluhan/Pengaduan Pelanggan</h4>
				</div>
				<div class="card-body">
					<form method="post" class="f1">
						<div class="f1-steps text-center">
							<div class="f1-progress">
								<div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
							</div>
							<div class="f1-step active">
								<div class="f1-step-icon text-center"><i class="fa fa-user"></i></div>
								<p>Data Pelanggan</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon text-center"><i class="fas fa-wifi"></i></div>
								<p>Jenis Modem</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon text-center"><i class="fas fa-question"></i></div>
								<p>Keluhan</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon text-center"><i class="fas fa-key"></i></div>
								<p>Penyesuaian</p>
							</div>
						</div>
						<!-- step 1 -->
						<fieldset>
							<h4>Data Pelanggan</h4>
							<div class="form-group">
								<label>Kode Pelanggan</label>
								<input type="text" name="kode_pelanggan" placeholder="contoh: 391294966325" class="form-control" value="<?= set_value('kode_pelanggan') ?>" required>
								<button type="button" class="btn btn-primary mt-2" id="verifikasiPelanggan">Verifikasi Pelanggan</button>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" readonly required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" value="<?= set_value('email') ?>" readonly required>
							</div>
							<div class="form-group">
								<label>No Handphone</label>
								<input type="text" name="no_hp" class="form-control" value="<?= set_value('no_hp') ?>" readonly required>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" readonly required>
							</div>
							<div class="f1-buttons">
								<button type="button" id="test" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
							</div>
						</fieldset>
						<!-- step 2 -->
						<fieldset>
							<h4>Data Modem</h4>
							<div class="form-group">
								<label>Kode Modem</label>
								<select name="kode_modem" class="form-control" id="verifikasiModem" required>
									<option value="" selected disabled>Pilih...</option>
									<?php foreach ($getModem as $modem) : ?>
										<option value="<?= $modem['kode_modem'] ?>" <?= set_value('kode_modem') == $modem['kode_modem'] ? 'selected' : '' ?>><?= $modem['modem'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tipe Modem</label>
								<input type="text" name="type_modem" class="form-control" value="<?= set_value('type_modem') ?>" readonly required>
							</div>
							<div class="form-group">
								<label>Nama Modem</label>
								<input type="text" name="modem" class="form-control" value="<?= set_value('modem') ?>" readonly required>
							</div>
							<div class="f1-buttons">
								<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
								<button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
							</div>
						</fieldset>
						<!-- step 3 -->
						<fieldset>
							<h4>Keluhan Pelanggan</h4>
							<p class="text-danger text-center">*Note: Jika tidak diisi akan otomatis terjawab <b>Tidak</b></p>
							<?php $no = 0;
							foreach ($getGejala as $gejala) : ?>
								<div class="form-group text-center">
									<h6 class="d-block"><?= $gejala['gejala'] ?></h6>
									<div class="form-check form-check-inline">
										<input class="form-check-input" name="jawaban[<?= $no ?>]" type="radio" id="<?= $gejala['kode_gejala'] . "1" ?>" value="<?= $gejala['kode_gejala'] ?>" data-fullgejala="<?= $gejala['kode_gejala'] . "," . $gejala['gejala'] ?>">
										<label class="form-check-label" for="<?= $gejala['kode_gejala'] . "1" ?>">Ya</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" name="jawaban[<?= $no ?>]" type="radio" id="<?= $gejala['kode_gejala'] . "2" ?>" value="undefined" data-fullgejala="">
										<label class="form-check-label" for="<?= $gejala['kode_gejala'] . "2" ?>">Tidak</label>
									</div>
								</div>
							<?php $no++;
							endforeach; ?>
							<div class="f1-buttons">
								<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
								<button type="button" id="from-gejala" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
							</div>
						</fieldset>
						<!-- step 4 -->
						<fieldset>
							<h4>Penyesuaian Keluhan</h4>
							<div class="empty-state">
								<div class="empty-state-icon">
									<i class="fas fa-key"></i>
								</div>
								<h2 id="kode-pelanggan">Kode Pelanggan - Nama Pelanggan</h2>
								<div class="profile-widget-description">
									<div class="profile-widget-name" id="kode-modem">kode modem
										<div class="text-muted d-inline font-weight-normal">
											<div class="slash"></div> modem
										</div>
									</div>
									<p class="font-weight-bold mt-2">Keluhan Anda</p>
									<table class="table table-responsive mt-3">
										<thead id="penyesuaian-keluhan">
											<tr>
												<th>Kode</th>
												<td>Gejala/Keluhan</td>
											</tr>
										</thead>
									</table>
								</div>
								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Kembali</button>
									<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Selesai</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
	$(function() {
		$('#verifikasiPelanggan').on('click', function() {
			$.ajax({
				type: 'POST',
				url: '<?= base_url() ?>/home/checkVerifikasiPelanggan',
				dataType: "json",
				data: {
					kode_pelanggan: $('input[name="kode_pelanggan"]').val()
				},
				success: function(data) {
					let popup = data == null ? "Pelanggan tidak ditemukan" : "Pelanggan berhasil ditemukan!"
					if (data != null) {
						$('input[name="nama"]').val(data["nama"])
						$('input[name="email"]').val(data["email"])
						$('input[name="no_hp"]').val(data["no_hp"])
						$('input[name="alamat"]').val(data["alamat"])

						$('#kode-pelanggan').html(data["nama"] + " - " + data["kode_pelanggan"])
					} else {
						$('input[name="nama"]').val("")
						$('input[name="email"]').val("")
						$('input[name="no_hp"]').val("")
						$('input[name="alamat"]').val("")

						$('#kode-pelanggan').html("Kode Pelanggan Tidak Ditemukan!")
					}
					alert(popup);
				},
			})
		})

		$('#from-gejala').on('click', function() {
			let arr = [];
			$(".form-check-input:checked").each(function() {
				if ($(this).data('fullgejala') != "") {
					arr.push($(this).data('fullgejala'));
				}
			});
			let str = ""
			for (let i = 0; i < arr.length; i++) {
				let splitGejala = arr[i].split(",")
				str += `<tr>
							<th>${splitGejala[0]}</th>
							<td>${splitGejala[1]}</td>
						</tr>`
			}
			if (str == "") {
				str = "Anda tidak mengeluhkan apapun disini! Silahkan kembali lagi."
			}
			$('#penyesuaian-keluhan').html(str)
		})

		$('#verifikasiModem').on('change', function() {
			$.ajax({
				type: 'POST',
				url: '<?= base_url() ?>/home/checkVerifikasiModem',
				dataType: "json",
				data: {
					kode_modem: $('select[name="kode_modem"] option').filter(':selected').val()
				},
				success: function(data) {
					if (data != null) {
						$('input[name="type_modem"]').val(data["type_modem"])
						$('input[name="modem"]').val(data["modem"])

						$('#kode-modem').html(`${data['modem']} <div class="text-muted d-inline font-weight-normal">
											<div class="slash"></div> ${data['kode_modem']} 
										</div>`)
					}
				},
			})
		})
	})
</script>