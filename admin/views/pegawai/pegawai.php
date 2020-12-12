<div class="row">
  <div class="pull-left">
    <h4>Daftar Pegawai</h4>
  </div>
  <div class="pull-right">
    <a href="index.php?mod=pegawai&page=add">
      <button class="btn btn-primary">Add</button>
    </a>
  </div>
</div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Pegawai</th>
        <th>Foto</th>
        <th>Jenis Kelamin</th>
        <th>ID</th>
        <th>No Pegawai</th>
        <th>Pendidikan</th>
        <th>Jabatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($pegawai != NULL) {
        $no = 1;
        foreach ($pegawai as $row) { ?>
          <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nama_pegawai'] ?></td>
            <td>
              <?php if (!empty($row['photo'])) : ?>
                <img src="../media/<?= $row['photo']; ?>" alt="<?= $row['nama_pegawai'] ?>" style="width: 100px; height:auto">
              <?php else : ?>
                <p>Tidak ada</p>
              <?php endif; ?>
            </td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['id_pegawai']; ?></td>
            <td><?= $row['no_pegawai'] ?></td>
            <td><?= $row['pendidikan'] ?></td>
            <td><?= $row['nama_spesialisasi'] ?></td>
            <td>
              <a href="index.php?page=edit&id=<?= $row['id_pegawai'] ?>"><i class="fa fa-pencil"></i> </a>
              <a href="index.php?page=delete&id=<?= $row['id_pegawai'] ?>"><i class="fa fa-trash"></i> </a>
            </td>
          </tr>
      <?php $no++;
        }
      } ?>
    </tbody>
  </table>
</div>