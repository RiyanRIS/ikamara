<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
	<div class="container">
		<div class="card m-3">
			<div class="card-header">
				Form Data Diri
			</div>
			<div class="card-body">
				<?= form_open(uri_string(), "autocomplete=\"off\"") ?>
				<div class="mb-3 row">
					<label for="email" class="col-sm-2 col-form-label">Email*</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control <?= (@$errors['email']?'is-invalid':'') ?>" id="email" placeholder="email@example.com" required=""
							autofocus="" value="<?= @$data['email'] ?>">
							<div class="invalid-feedback">
								<?= @$errors['email'] ?>
							</div>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nama" class="col-sm-2 col-form-label">Nama Lengkap*</label>
					<div class="col-sm-10">
						<input type="text" name="nama" class="form-control" id="nama" placeholder="tidak boleh nama panggilan"
							required="" value="<?= @$data['nama'] ?>">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir*</label>
					<div class="col-sm-10">
						<input type="text" name="tempat" class="form-control" id="tempat" placeholder="nama kota kelahiran"
							required="" value="<?= @$data['tempat'] ?>">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir*</label>
					<div class="col-sm-1">
						<input type="text" name="tanggal" maxlength="2" class="form-control" id="tanggal" placeholder="<?= date("d") ?>"
							required="" value="<?= @$data['tanggal'] ?>">
					</div>
					<div class="col-sm-2">
						<select name="bulan" class="form-select" required="" id="bulan">
							<option <?= selected(@$data['bulan'], "01") ?> value="01">Januari</option>
							<option <?= selected(@$data['bulan'], "02") ?> value="02">Februari</option>
							<option <?= selected(@$data['bulan'], "03") ?> value="03">Maret</option>
							<option <?= selected(@$data['bulan'], "04") ?> value="04">April</option>
							<option <?= selected(@$data['bulan'], "05") ?> value="05">Mei</option>
							<option <?= selected(@$data['bulan'], "06") ?> value="06">Juni</option>
							<option <?= selected(@$data['bulan'], "07") ?> value="07">Juli</option>
							<option <?= selected(@$data['bulan'], "08") ?> value="08">Agustus</option>
							<option <?= selected(@$data['bulan'], "09") ?> value="09">September</option>
							<option <?= selected(@$data['bulan'], "10") ?> value="10">Oktober</option>
							<option <?= selected(@$data['bulan'], "11") ?> value="11">November</option>
							<option <?= selected(@$data['bulan'], "12") ?> value="12">Desember</option>
						</select>
					</div>
					<div class="col-sm-2">
						<input type="text" maxlength="4" name="tahun" class="form-control" id="tahun" placeholder="<?= date("Y") ?>"
							required="" value="<?= @$data['tahun'] ?>">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="jenkel1" class="col-sm-2 col-form-label">Jenis Kelamin*</label>
					<div class="col-sm-10">
						<input type="radio" <?= checked(@$data['jenkel'], "Laki-Laki") ?> name="jenkel" class="form-check-input" id="jenkel1" value="Laki-Laki" required=""> <label for="jenkel1">Laki-Laki</label>
						&nbsp;&nbsp;&nbsp;
						<input type="radio" <?= checked(@$data['jenkel'], "Perempuan") ?> name="jenkel" class="form-check-input" id="jenkel2" value="Perempuan"> <label for="jenkel2">Perempuan</label>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="agama" class="col-sm-2 col-form-label">Agama*</label>
					<div class="col-sm-10">
						<select name="agama" id="agama" class="form-select" required="">
							<option <?= selected(@$data['agama'], "Islam") ?> value="Islam">Islam</option>
							<option <?= selected(@$data['agama'], "Kristen") ?> value="Kristen">Kristen</option>
							<option <?= selected(@$data['agama'], "Khatolik") ?> value="Khatolik">Khatolik</option>
							<option <?= selected(@$data['agama'], "Hindu") ?> value="Hindu">Hindu</option>
							<option <?= selected(@$data['agama'], "Budha") ?> value="Budha">Budha</option>
							<option <?= selected(@$data['agama'], "Konghuchu") ?> value="Konghuchu">Konghuchu</option>
							<option <?= selected(@$data['agama'], "Kepercayaan Lain") ?> value="Kepercayaan Lain">Kepercayaan Lain</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nohp" class="col-sm-2 col-form-label">No. Handphone*</label>
					<div class="col-sm-10">
						<input type="text" name="nohp" class="form-control" id="nohp" placeholder="08xxxx" required="" value="<?= @$data['nohp'] ?>">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="jenis" class="col-sm-2 col-form-label">Status Keanggotaan*</label>
					<div class="col-sm-10">
						<input type="radio" <?= checked(@$data['jenis'], "Pelajar") ?> required="" name="jenis" class="form-check-input" id="jenis1" value="Pelajar"> <label for="jenis1">Pelajar</label>&nbsp;&nbsp;
						<input type="radio" <?= checked(@$data['jenis'], "Mahasiswa") ?> required="" name="jenis" class="form-check-input" id="jenis2" value="Mahasiswa"> <label for="jenis2">Mahasiswa</label>&nbsp;&nbsp;
						<input type="radio" <?= checked(@$data['jenis'], "Masyarakat") ?> required="" name="jenis" class="form-check-input" id="jenis3" value="Masyarakat"> <label for="jenis3">Masyarakat</label>&nbsp;&nbsp;
						<input type="radio" <?= checked(@$data['jenis'], "Alumni") ?> required="" name="jenis" class="form-check-input" id="jenis4" value="Alumni"> <label for="jenis4">Alumni</label>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="submit" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<button class="btn btn-primary"><i class="fa fa-arrow-alt-circle-right"></i> Selanjutnya</button>
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