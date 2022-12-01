<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Kelola Rules</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="<?= base_url('tleader') ?>">Team Leader</a></div>
				<div class="breadcrumb-item"><a href="<?= base_url('tleader/data_rules') ?>">Kelola Rules</a></div>
				<div class="breadcrumb-item active">Data</div>
			</div>
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
		<h2 class="section-title">Data Rules</h2>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Rules</h4>
							<a href="<?= base_url('tleader/input_rules') ?>" class="btn btn-primary ml-auto"><i class="fas fa-plus-circle"></i> Tambah Rules</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Kode Rules</th>
											<th>Kode Solusi</th>
											<th>Kode Gejala</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($getRules as $rules) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td>
													<?= $rules['kode_rules'] ?>
													<br>
													<a href="<?= base_url('tleader/ubah_rules/' . $rules['kode_rules']) ?>">Ubah</a> |
													<a href="<?= base_url('tleader/hapus_rules/' . $rules['kode_rules']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
												</td>
												<td><?= $rules['kode_solusi_rules'] ?></td>
												<td><?= $rules['kode_gejala_rules'] ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<img src="" id="image" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
