        <div class="mb-3 row">
          <label for="univ" class="col-sm-2 col-form-label">Nama Universitas*</label>
          <div class="col-sm-10">
            <input type="text" name="univ" class="form-control" id="univ" placeholder="Nama Universitas"
              required="" value="<?= @$data['univ'] ?>">
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
        