<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>
<?php
$tgl = $data['tanggal'];
$data['tanggal'] = date("d", strtotime($tgl));
$data['bulan'] = date("m", strtotime($tgl));
$data['tahun'] = date("Y", strtotime($tgl));

?>
<main class="flex-shrink-0 mt-5">
	<div class="container">
		<div class="card m-3">
			<div class="card-header">
				Form Data Diri
			</div>
			<div class="card-body">
				<?= form_open("simpan/datadiri", "autocomplete=\"off\"");
				form_hidden("id", $data['id']);
				form_hidden("jenis", $data['jenis']);
				?>
				<div class="mb-3 row">
					<label for="email" class="col-sm-2 col-form-label">Email*</label>
					<div class="col-sm-10">
						<input type="email" disabled="" name="emails" class="form-control <?= (@$errors['email']?'is-invalid':'') ?>" id="email" placeholder="email@example.com" required=""
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
						<input type="text" disabled="" class="form-control" value="<?= $data['jenis'] ?>">
					</div>
				</div>
				<hr/>

				<?php if($data['jenis'] == "Pelajar"){ 
					echo view("form/detail_pelajar");
				}elseif($data['jenis'] == "Mahasiswa"){
					echo view("form/detail_mahasiswa");
				}elseif($data['jenis'] == "Masyarakat"){
					echo view("form/detail_masyarakat");
				}elseif($data['jenis'] == "Alumni"){
					echo view("form/detail_alumni");
				} ?>

				<hr/>

				<div class="mb-3 row">
          <label for="ajalan" class="col-sm-2 col-form-label">Alamat di Aceh*</label>
          <div class="col-sm-10">
            <input type="text" name="ajalan" class="form-control" id="ajalan"
              placeholder="detail alamat lengkap (nama kampung, jalan dan nomor rumah)" required="" 
              value="<?= @$data['ajalan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-2"></div>
          <div class="col-sm-3">
            <input type="text" name="akel" class="form-control" id="akel" placeholder="Dusun/Kelurahan*" required=""
               value="<?= @$data['akel'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="akec" class="form-control" id="akec" placeholder="Kecamatan*" required=""
               value="<?= @$data['akec'] ?>">
          </div>
          <div class="col-sm-3">
            <input type="text" name="akab" class="form-control" id="akab" placeholder="Kota/Kabupaten*" required=""
               value="<?= @$data['akab'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="akod" class="form-control" id="akod" placeholder="Kode Pos"
               value="<?= @$data['akod'] ?>">
          </div>
        </div>

				<?php if($data['jenis'] != "Alumni"){ ?>

				<div class="mb-3 row">
          <label for="djalan" class="col-sm-2 col-form-label">Alamat di DIY*</label>
          <div class="col-sm-10">
            <input type="text" name="djalan" class="form-control" id="djalan"
              placeholder="detail alamat lengkap (nama kampung, jalan dan nomor rumah)" required="" 
              value="<?= @$data['djalan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-2"></div>
          <div class="col-sm-3">
            <input type="text" name="dkel" class="form-control" id="dkel" placeholder="Dusun/Kelurahan*" required=""
               value="<?= @$data['dkel'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="dkec" class="form-control" id="dkec" placeholder="Kecamatan*" required=""
               value="<?= @$data['dkec'] ?>">
          </div>
          <div class="col-sm-3">
            <input type="text" name="dkab" class="form-control" id="dkab" placeholder="Kota/Kabupaten*" required=""
               value="<?= @$data['dkab'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="dkod" class="form-control" id="dkod" placeholder="Kode Pos"
               value="<?= @$data['dkod'] ?>">
          </div>
        </div>

				<?php } ?>

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