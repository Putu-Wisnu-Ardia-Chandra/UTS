<h4>Tambah Masyarakat</h4>
<hr>
<form action="index.php?mod=masyarakat&page=save" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Nama Penduduk</label>
    <input type="text" name="nama_masyarakat" required value="<?= (isset($_POST['nama_masyarakat'])) ? $_POST['nama_masyarakat'] : ''; ?>" class="form-control">
    <input type="hidden" name="id_masyarakat" value="<?= (isset($_POST['id_masyarakat'])) ? $_POST['id_masyarakat'] : ''; ?>" class="form-control">
    <input type="hidden" name="photo_old" value="<?= (isset($_POST['photo'])) ? $_POST['photo'] : ''; ?> ">
  </div>
  <div class="form-group">
    <label for="">No Kartu Keluarga</label>
    <input type="number" name="no_kk" value="<?= (isset($_POST['no_kk'])) ? $_POST['no_kk'] : ''; ?>" class="form-control">
  </div>
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
  </div>
  <div class="form-group">
    <label for="">Pilih Pekerjaan</label>
    <select name="id_pekerjaan" class="form-control" required id="">
      <option value="">Pilih Pekerjaan</option>
      <?php if ($pekerjaan != NULL) {
        foreach ($pekerjaan as $row) { ?>
          <option <?= (isset($_POST['id_pekerjaan']) && $_POST['id_pekerjaan'] == $row['id_pekerjaan']) ? "selected" : ''; ?> value="<?= $row['id_pekerjaan']; ?>"> <?= $row['pekerjaan']; ?></option>
      <?php }
      } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="">Photo</label>
    <input type="file" name="fileToUpload" class="from-control">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>