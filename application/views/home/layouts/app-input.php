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
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/stisla') ?>/assets/css/components.css">
	<style>
		.f1-steps {
			overflow: hidden;
			position: relative;
			margin-top: 20px;
		}

		.f1-progress {
			position: absolute;
			top: 24px;
			left: 0;
			width: 100%;
			height: 1px;
			background: #ddd;
		}

		.f1-progress-line {
			position: absolute;
			top: 0;
			left: 0;
			height: 1px;
			background: #fc544b;
		}

		.f1-step {
			position: relative;
			float: left;
			width: 25%;
			padding: 0 5px;
		}

		.f1-step-icon {
			display: inline-block;
			width: 40px;
			height: 40px;
			margin-top: 4px;
			background: #ddd;
			font-size: 16px;
			color: #fff;
			line-height: 40px;
			-moz-border-radius: 50%;
			-webkit-border-radius: 50%;
			border-radius: 50%;
		}

		.f1-step.activated .f1-step-icon {
			background: #fff;
			border: 1px solid #fc544b;
			color: #fc544b;
			line-height: 38px;
		}

		.f1-step.active .f1-step-icon {
			width: 48px;
			height: 48px;
			margin-top: 0;
			background: #fc544b;
			font-size: 22px;
			line-height: 48px;
		}

		.f1-step p {
			color: #ccc;
		}

		.f1-step.activated p {
			color: #fc544b;
		}

		.f1-step.active p {
			color: #fc544b;
		}

		.f1 fieldset {
			display: none;
			text-align: left;
		}

		.f1-buttons {
			text-align: right;
		}

		.f1 .input-error {
			border-color: #f35b3f;
		}
	</style>
</head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<!-- Navbar -->
			<?php $this->load->view('home/components/navbar') ?>
			<!-- Main Content -->
			<?php $this->load->view($content) ?>
			<!-- Footer -->
			<?php $this->load->view('home/components/footer') ?>
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
	<script src="<?= base_url('assets/template/stisla') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

	<!-- Template JS File -->
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/template/stisla') ?>/assets/js/custom.js"></script>
	<script>
		$(document).on('click', '.preview-brosur', function(e) {
			e.preventDefault()
			$('#exampleModal').modal('show')
			let path = '<?= base_url('assets/images/') ?>';
			$('#image').attr('src', path + $(this).data('img'))
		})

		function scroll_to_class(element_class, removed_height) {
			var scroll_to = $(element_class).offset().top - removed_height;
			if ($(window).scrollTop() != scroll_to) {
				$('html, body').stop().animate({
					scrollTop: scroll_to
				}, 0);
			}
		}

		function bar_progress(progress_line_object, direction) {
			var number_of_steps = progress_line_object.data('number-of-steps');
			var now_value = progress_line_object.data('now-value');
			var new_value = 0;
			if (direction == 'right') {
				new_value = now_value + (100 / number_of_steps);
			} else if (direction == 'left') {
				new_value = now_value - (100 / number_of_steps);
			}
			progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
		}

		$(document).ready(function() {
			// Form
			$('.f1 fieldset:first').fadeIn('slow');

			$('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="checkbox"], .f1 textarea').on('focus', function() {
				$(this).removeClass('input-error');
			});

			// step selanjutnya (ketika klik tombol selanjutnya)
			$('.f1 .btn-next').on('click', function() {
				var parent_fieldset = $(this).parents('fieldset');
				var next_step = true;
				// navigation steps / progress steps
				var current_active_step = $(this).parents('.f1').find('.f1-step.active');
				var progress_line = $(this).parents('.f1').find('.f1-progress-line');

				// validasi form
				parent_fieldset.find('input[type="text"], input[type="password"], input[type="checkbox"], textarea').each(function() {
					if ($(this).val() == "") {
						$(this).addClass('input-error');
						next_step = false;
					} else {
						$(this).removeClass('input-error');
					}
				});

				if (next_step) {
					parent_fieldset.fadeOut(400, function() {
						// change icons
						current_active_step.removeClass('active').addClass('activated').next().addClass('active');
						// progress bar
						bar_progress(progress_line, 'right');
						// show next step
						$(this).next().fadeIn();
						// scroll window to beginning of the form
						scroll_to_class($('.f1'), 20);
					});
				}
			});

			// step sbelumnya (ketika klik tombol sebelumnya)
			$('.f1 .btn-previous').on('click', function() {
				// navigation steps / progress steps
				var current_active_step = $(this).parents('.f1').find('.f1-step.active');
				var progress_line = $(this).parents('.f1').find('.f1-progress-line');

				$(this).parents('fieldset').fadeOut(400, function() {
					// change icons
					current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
					// progress bar
					bar_progress(progress_line, 'left');
					// show previous step
					$(this).prev().fadeIn();
					// scroll window to beginning of the form
					scroll_to_class($('.f1'), 20);
				});
			});

			// submit (ketika klik tombol submit diakhir wizard)
			$('.f1').on('submit', function(e) {
				// validasi form
				$(this).find('input[type="text"], input[type="password"], input[type="checkbox"], textarea').each(function() {
					if ($(this).val() == "") {
						e.preventDefault();
						$(this).addClass('input-error');
					} else {
						$(this).removeClass('input-error');
					}
				});
			});
		});
	</script>
</body>

</html>
