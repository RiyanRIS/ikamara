        <div class="mb-3 row">
          <label for="perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan*</label>
          <div class="col-sm-10">
            <input type="text" name="perusahaan" class="form-control" id="perusahaan" placeholder="Nama Perusahaan"
              required="" value="<?= @$data['perusahaan'] ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jabatan" class="col-sm-2 col-form-label">Jabatan*</label>
          <div class="col-sm-10">
            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan"
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
        