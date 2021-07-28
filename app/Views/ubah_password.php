<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
	<div class="container">
		<div class="card m-3">
			<div class="card-header">
				Form Ganti Password
			</div>
			<div class="card-body">
				<?= form_open(uri_string(), "autocomplete=\"off\""); ?>
				<div class="mb-3 row">
					<label for="password" class="col-sm-2 col-form-label">Password Lama*</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control <?= (@$password?'is-invalid':'') ?>" id="password" placeholder="Password Lama" required=""
							autofocus="">
							<div class="invalid-feedback">
								<?= @$password ?>
							</div>
					</div>
				</div>
        <div class="mb-3 row">
					<label for="pw1" class="col-sm-2 col-form-label">Password Baru*</label>
					<div class="col-sm-10">
						<input type="password" name="pw1" class="form-control <?= (@$errors['pw1']?'is-invalid':'') ?>" id="pw1" placeholder="Password Baru" required="">
							<div class="invalid-feedback">
								<?= @$errors['pw1'] ?>
							</div>
					</div>
				</div>
        <div class="mb-3 row">
					<label for="pw2" class="col-sm-2 col-form-label">Konfirmasi*</label>
					<div class="col-sm-10">
						<input type="password" name="pw2" class="form-control <?= (@$errors['pw2']?'is-invalid':'') ?>" id="pw2" placeholder="Konfirmasi Password Baru" required="">
							<div class="invalid-feedback">
								<?= @$errors['pw2'] ?>
							</div>
					</div>
				</div>

        <div class="mb-3 row">
					<label for="submit" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>

				<?= form_close() ?>
			</div>
		</div>
	</div>
</main>

<?= view("_temp/foot") ?>

</body>

</html>