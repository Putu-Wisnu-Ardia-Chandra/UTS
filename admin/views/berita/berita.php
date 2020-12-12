<div class="row">
  <div class="pull-left">
    <h4>Berita dan Informasi</h4>
  </div>
  <div class="pull-right">
    <a href="index.php?mod=berita&page=add">
      <button class="btn btn-primary">Add</button>
    </a>
  </div>
</div>

<div class="row">
  <?php if ($berita != NULL) : ?>
    <?php foreach ($berita as $row) : ?>
      <div style="margin-bottom: 10px;">
        <h3 class="bg-primary" style="padding: 8px 0 8px 8px; margin-bottom:0"><?= $row['judul']; ?></h3>
        <p class="bg-warning" style="padding: 8px 0 8px 8px; margin-bottom:5px;"><?= $row['isi']; ?></p>
        <a href="index.php?mod=berita&page=edit&id=<?= $row['id_berita'] ?>"><i class="fa fa-pencil"></i> </a>
        <a href="index.php?mod=berita&page=delete&id=<?= $row['id_berita'] ?>"><i class="fa fa-trash"></i> </a>
      <?php endforeach; ?>
    <?php endif; ?>
      </div>
</div>