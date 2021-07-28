	<footer class="footer mt-auto py-3 bg-light">
		<div class="container">
			<span class="text-muted">&copy;copyright <?= date("Y") ?> <a style="text-decoration:none" href="javascript:void()"> Ikamara Yogyakarta</a></span>
		</div>
	</footer>

	<script src="<?= base_url() ?>/assets/js/jquery.js"></script>
	<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/all.min.js"></script>

	<script>
		<?php if(session()->has('msg_success')){ ?>
			Swal.fire(
				'Berhasil!',
				'<?= session()->get('msg_success') ?>',
				'success'
			)
		<?php } ?>

		<?php if(session()->has('msg_error')){ ?>
			Swal.fire(
				'Kesalahan!',
				'<?= session()->get('msg_error') ?>',
				'error'
			)
		<?php } ?>
	</script>