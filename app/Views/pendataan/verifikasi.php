<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
	<div class="container">
		<div class="card m-3">
			<div class="card-header">
				Verifikasi data
			</div>
			<div class="card-body">
				<p>Pastikan data yang kamu masukkan sesuai.</p>
        <?= $tabel ?>
        <a href="javascript:void()" onclick="window.history.go(-1); return false;" class="btn btn-warning"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
        <a href="<?= site_url('pendataan/simpan') ?>" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
			</div>
		</div>
	</div>
</main>

<?= view("_temp/foot") ?>

</body>

</html>