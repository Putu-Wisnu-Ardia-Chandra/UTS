<div class="row">
  <div class="pull-left">
    <h4>Data Masyarakat</h4>
  </div>
  <div class="pull-right">
    <a href="index.php?mod=masyarakat&page=add">
      <button class="btn btn-primary">Add</button>
    </a>
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>No ID</th>
        <th>Nomor KK</th>
        <th>Pendidikan</th>
        <th>Pekerjaan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($masyarakat != NULL) {
        $no = 1;
        foreach ($masyarakat as $row) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td>
              <?php if (!empty($row['photo'])) : ?>
                <img src="../media/<?= $row['photo']; ?>" alt="<?= $row['photo'] ?>" style="width: 100px; height:auto;">
              <?php else : ?>
                <p>Tidak ada</p>
              <?php endif; ?>
            </td>
            <td><?= $row['nama_masyarakat']; ?></td>
            <td><?= $row['id_masyarakat']; ?></td>
            <td><?= $row['no_kk']; ?></td>
            <td><?= $row['pendidikan']; ?></td>
            <td><?= $row['pekerjaan']; ?></td>
            <td>
              <a href="index.php?mod=masyarakat&page=edit&id=<?= $row['id_masyarakat'] ?>"><i class="fa fa-pencil"></i> </a>
              <a href="index.php?mod=masyarakat&page=delete&id=<?= $row['id_masyarakat'] ?>"><i class="fa fa-trash"></i> </a>
            </td>
          </tr>
      <?php $no++;
        }
      } ?>
    </tbody>
  </table>
</div>