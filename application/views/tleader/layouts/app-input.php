<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= $judul ?></title>
	<link rel="icon" href="<?= base_url('assets/layout/telkom.png') ?>" type="image">

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/node_modules/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/node_modules/summernote/dist/summernote-bs4.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/components.css">
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<!-- Navbar -->
			<?php $this->load->view('tleader/components/navbar') ?>
			<!-- Sidebar -->
			<?php $this->load->view('tleader/components/sidebar') ?>

			<!-- Main Content -->
			<?php $this->load->view($content) ?>
			<!-- Footer -->
			<?php $this->load->view('tleader/components/footer') ?>
		</div>
	</div>
	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="<?= base_url('assets/template/stisla') ?>/node_modules/select2/dist/js/select2.full.min.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/node_modules/summernote/dist/summernote-bs4.js"></script>

	<!-- Template JS File -->
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script>
		$('#generate-id').on('click', function() {
			generate()
		})

		$('.summernote').attr('name', 'solusi');

		function generate() {
			$.ajax({
				url: "<?= base_url('tleader/generate') ?>",
				method: "POST",
				dataType: 'json',
				success: function(response) {
					$('[name="kode_pelanggan"]').val(response.id)
				}
			})
		}
	</script>
</body>

</html>
