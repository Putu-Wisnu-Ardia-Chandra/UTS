<h4>Tambah Kritik dan Saran</h4>
<hr>
<form action="index.php?mod=krisan&page=save" class="ajax" method="POST">
  <div class="form-group">
    <input type="hidden" name="id_krisan" value="<?= (isset($_POST['id_krisan'])) ? $_POST['id_krisan'] : ''; ?>" class="form-control">
    <label for="nama">Nama Penduduk</label>
    <input type="text" name="nama" id="nama" required value="<?= (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="kritik">Kritik</label>
    <textarea rows="5" name="kritik" id="kritik" required class="form-control"><?= (isset($_POST['kritik'])) ? $_POST['kritik'] : ''; ?></textarea>
  </div>
  <div class="form-group">
    <label for="saran">Saran</label>
    <textarea rows="5" name="saran" id="saran" required class="form-control"><?= (isset($_POST['saran'])) ? $_POST['saran'] : ''; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
<?php if (isset($err['msg'])) : ?>
  <p class="bg-danger" style="padding:10px; width:fit-content; border-radius:5px; margin-top:10px;"><?= $err['msg']; ?></p>
<?php endif; ?>