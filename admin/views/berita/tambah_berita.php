<h4>Tambah Berita</h4>
<hr>
<form action="index.php?mod=berita&page=save" method="POST">
  <div class="form-group">
    <input type="hidden" name="id_berita" value="<?= (isset($_POST['id_berita'])) ? $_POST['id_berita'] : ''; ?>" class="form-control">
    <label for="judul">Judul Berita</label>
    <input type="text" name="judul" id="judul" required value="<?= (isset($_POST['judul'])) ? $_POST['judul'] : ''; ?>" class="form-control">
  </div>
  <div class="form-group">
    <label for="isi">Isi Berita</label>
    <textarea rows="5" name="isi" id="isi" required class="form-control"><?= (isset($_POST['isi'])) ? $_POST['isi'] : ''; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Tambah</button>
</form>
<?php if (isset($err['msg'])) : ?>
  <p class="bg-danger" style="padding:10px; width:fit-content; border-radius:5px; margin-top:10px;"><?= $err['msg']; ?></p>
<?php endif; ?>