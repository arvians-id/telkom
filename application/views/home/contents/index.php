<div class="main-content">
	<section class="section">
		<div class="section-header">
			<img src="<?= base_url('assets/layout/telkom.png') ?>" alt="logo" width="80" class="rounded-circle">
			<h1>Telkom Akses</h1>
		</div>

		<div class="section-body">
			<div class="d-flex justify-content-between">
				<div>
					<a href="javascript:void(0);" data-img="1.jpg" class="preview-brosur">
						<img src="<?= base_url('assets/images/1.jpg') ?>" width="250" class="img-thumbnail mb-2" alt="">
					</a>
				</div>
				<div>
					<a href="javascript:void(0);" data-img="2.jpg" class="preview-brosur">
						<img src="<?= base_url('assets/images/2.jpg') ?>" width="250" class="img-thumbnail mb-2" alt="">
					</a>
				</div>
				<div>
					<a href="javascript:void(0);" data-img="3.jpg" class="preview-brosur">
						<img src="<?= base_url('assets/images/3.jpg') ?>" width="250" class="img-thumbnail mb-2" alt="">
					</a>
				</div>
			</div>
			<h2 class="section-title">Data Pelanggan</h2>
			<div class="card">
				<div class="card-header">
					<h4>Pelanggan</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="pelanggan">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>ID Pelanggan</th>
									<th>Nama</th>
									<th>Paket</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($getPelanggan as $pelanggan) : ?>
									<tr>
										<td class="text-center"><?= $no++ ?></td>
										<td style="width: 200px;">
											<?= $pelanggan['kode_pelanggan']  ?>
										</td>
										<td><?= $pelanggan['nama'] ?></td>
										<td><?= $pelanggan['paket'] ?></td>
										<td class="text-center">
											<div class="badge badge-<?= $pelanggan['status_keterangan'] ?>"><?= $pelanggan['status'] ?></div>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="" id="image" class="img-fluid">
			</div>
		</div>
	</div>
</div>
