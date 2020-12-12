<div class="row">
  <div class="pull-left">
    <h4>Data Kritik dan Saran</h4>
  </div>
  <div class="pull-right">
    <a href="index.php?mod=krisan&page=add">
      <button class="btn btn-primary">Add</button>
    </a>
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Penduduk</th>
        <th>Kritik</th>
        <th>Saran</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($krisan != NULL) {
        $no = 1;
        foreach ($krisan as $row) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kritik']; ?></td>
            <td><?= $row['saran']; ?></td>
            <td>
              <a href="index.php?mod=krisan&page=edit&id=<?= $row['id_krisan'] ?>"><i class="fa fa-pencil"></i> </a>
              <a href="index.php?mod=krisan&page=delete&id=<?= $row['id_krisan'] ?>"><i class="fa fa-trash"></i> </a>
            </td>
          </tr>
      <?php $no++;
        }
      } ?>
    </tbody>
  </table>
</div>