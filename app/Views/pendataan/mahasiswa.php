<?= view("_temp/head") ?>

<?= view("_temp/nav") ?>

<main class="flex-shrink-0 mt-5">
  <div class="container">
    <?= form_open("pendataan/verifikasi", "autocomplete=\"off\"") ?>
    <div class="card m-3">
      <div class="card-header">
        Detail Mahasiswa
      </div>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="univ" class="col-sm-2 col-form-label">Nama Universitas*</label>
          <div class="col-sm-10">
            <input type="text" name="univ" class="form-control" id="univ" placeholder="Nama Universitas"
              required="" autofocus="" value="<?= @$data['univ'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jenjang" class="col-sm-2 col-form-label">Jenjang*</label>
          <div class="col-sm-10">
            <input type="text" name="jenjang" class="form-control" id="jenjang" placeholder="Jenjang"
              required="" value="<?= @$data['jenjang'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jurusan" class="col-sm-2 col-form-label">Jurusan*</label>
          <div class="col-sm-10">
            <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan"
              required="" value="<?= @$data['jurusan'] ?>">
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
          <div class="col-sm-2">
            <input type="text" name="akod" class="form-control" id="akod" placeholder="Kode Pos"
              autofocus="" value="<?= @$data['akod'] ?>">
          </div>
        </div>
        <hr>
        <div class="mb-3 row">
          <label for="jalan" class="col-sm-2 col-form-label">Alamat di DIY*</label>
          <div class="col-sm-10">
            <input type="text" name="djalan" class="form-control" id="djalan"
              placeholder="detail alamat lengkap (nama jalan dan nomor rumah)" required="" autofocus=""
              value="<?= @$data['djalan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-2"></div>
          <div class="col-sm-3">
            <input type="text" name="dkel" class="form-control" id="dkel" placeholder="Kelurahan*" required=""
              autofocus="" value="<?= @$data['dkel'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="dkec" class="form-control" id="dkec" placeholder="Kecamatan*" required=""
              autofocus="" value="<?= @$data['dkec'] ?>">
          </div>
          <div class="col-sm-3">
            <input type="text" name="dkab" class="form-control" id="dkab" placeholder="Kota/Kabupaten*" required=""
              autofocus="" value="<?= @$data['dkab'] ?>">
          </div>
          <div class="col-sm-2">
            <input type="text" name="dkod" class="form-control" id="dkod" placeholder="Kode Pos"
              autofocus="" value="<?= @$data['dkod'] ?>">
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