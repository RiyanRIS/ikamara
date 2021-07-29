<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
  <div class="container">
    <?= form_open("pendataan/verifikasi", "autocomplete=\"off\"") ?>
    <div class="card m-3">
      <div class="card-header">
        Detail Alumni
      </div>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan*</label>
          <div class="col-sm-10">
            <input type="text" name="perusahaan" class="form-control" id="perusahaan" placeholder="Bekerja di ...."
              required="" autofocus="" value="<?= @$data['perusahaan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jabatan" class="col-sm-2 col-form-label">Jabatan*</label>
          <div class="col-sm-10">
            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan atau status pekerjaan"
              required="" value="<?= @$data['jabatan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="perkawinan1" class="col-sm-2 col-form-label">Status Perkawinan*</label>
         <div class="col-sm-10">
						<input type="radio" <?= checked(@$data['perkawinan'], "Belum Kawin") ?> name="perkawinan" class="form-check-input" id="perkawinan1" value="Belum Kawin" required=""> <label for="perkawinan1">Belum Kawin</label>
						&nbsp;&nbsp;&nbsp;
						<input type="radio" <?= checked(@$data['perkawinan'], "Kawin") ?> name="perkawinan" class="form-check-input" id="perkawinan2" value="Kawin"> <label for="perkawinan2">Kawin</label>
					</div>
        </div>
        <br/>
        <h5>Detail Alamat</h5>
        <div class="mb-3 row">
          <label for="jalan" class="col-sm-2 col-form-label">Alamat di Aceh Tenggara*</label>
          <div class="col-sm-10">
            <input type="text" name="ajalan" class="form-control" id="ajalan"
              placeholder="detail alamat lengkap (nama kampung, jalan dan nomor rumah)" required="" autofocus=""
              value="<?= @$data['ajalan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-2"></div>
          <div class="col-sm-3">
            <input type="text" name="akel" class="form-control" id="akel" placeholder="Dusun/Kelurahan*" required=""
              autofocus="" value="<?= @$data['akel'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="akec" class="form-control" id="akec" placeholder="Kecamatan*" required=""
              autofocus="" value="<?= @$data['akec'] ?>">
          </div>
          <div class="col-sm-3">
            <input type="text" name="akab" class="form-control" id="akab" placeholder="Kota/Kabupaten*" required=""
              autofocus="" value="<?= @$data['akab'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="akod" class="form-control" id="akod" placeholder="Kode Pos"
              autofocus="" value="<?= @$data['akod'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
					<label for="submit" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
            <a href="javascript:void()" onclick="window.history.go(-1); return false;" class="btn btn-warning"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
            <button class="btn btn-primary"><i class="fa fa-arrow-alt-circle-right"></i> Selanjutnya</button>
					
					</div>
				</div>
      </div>
    </div>

    <?= form_close() ?>
  </div>
</main>

<?= view("_temp/foot") ?>

</body>

</html>