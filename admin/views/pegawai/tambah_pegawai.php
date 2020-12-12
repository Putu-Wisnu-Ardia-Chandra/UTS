<h4>Tambah Pegawai</h4>
<hr>
<form action="index.php?page=save" method="POST" enctype="multipart/form-data" class="ajax">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Nama Pegawai</label>
        <input type="text" name="nama_pegawai" required value="<?= (isset($_POST['nama_pegawai'])) ? $_POST['nama_pegawai'] : ''; ?>" class="form-control">
        <input type="hidden" name="id_pegawai" value="<?= (isset($_POST['id_pegawai'])) ? $_POST['id_pegawai'] : ''; ?>" class="form-control">
        <input type="hidden" name="photo_old" value="<?= (isset($_POST['photo'])) ? $_POST['photo'] : ''; ?>">
        <span class="text-danger"><?= (isset($err['nama_pegawai'])) ? $err['nama_pegawai'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="">No ID</label>
        <input type="number" name="no_id" value="<?= (isset($_POST['no_id'])) ? $_POST['no_id'] : ''; ?>" class="form-control">
        <span class="text-danger"><?= (isset($err['no_id'])) ? $err['no_id'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
          <option value="Laki-Laki" <?php if (isset($_POST['jenis_kelamin']) &&  $_POST['jenis_kelamin'] == "Laki-Laki") echo 'selected' ?>>Laki-Laki</option>
          <option value="Perempuan" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "Perempuan") echo 'selected' ?>>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Nomor Pegawai</label>
        <input type="number" name="no_pegawai" value="<?= (isset($_POST['no_pegawai'])) ? $_POST['no_pegawai'] : ''; ?>" class="form-control">
        <span class="text-danger"><?= (isset($err['no_pegawai'])) ? $err['no_pegawai'] : ''; ?></span>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Pendidikan Terakhir</label>
        <select name="id_pendidikan" class="form-control" required id="">
          <option value="">Pilih Pendidikan</option>
          <?php if ($pendidikan != NULL) {
            foreach ($pendidikan as $row) { ?>
              <option <?= (isset($_POST['id_pendidikan']) && $_POST['id_pendidikan'] == $row['id_pendidikan']) ? "selected" : ''; ?> value="<?= $row['id_pendidikan']; ?>"> <?= $row['pendidikan']; ?></option>
          <?php }
          } ?>
        </select>
        <span class="text-danger"><?= (isset($err['id_pendidikan'])) ? $err['id_pendidikan'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="">Jabatan</label>
        <select name="id_spesialisasi" class="form-control" required id="">
          <option value="">Pilih Spesialisasi</option>
          <?php if ($spesialis != NULL) {
            foreach ($spesialis as $row) { ?>
              <option <?= (isset($_POST['id_spesialisasi']) && $_POST['id_spesialisasi'] == $row['id_spesialisasi']) ? "selected" : ''; ?> value="<?= $row['id_spesialisasi']; ?>"> <?= $row['nama_spesialisasi']; ?></option>
          <?php }
          } ?>
        </select>
        <span class="text-danger"><?= (isset($err['id_spesialisasi'])) ? $err['id_spesialisasi'] : ''; ?></span>
      </div>
      <div class="form-group">
        <label for="">Photo</label>
        <input type="file" name="fileToUpload" class="from-control">
        <span class="text-danger"><?= (isset($err['fileToUpload'])) ? $err['fileToUpload'] : ''; ?></span>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>