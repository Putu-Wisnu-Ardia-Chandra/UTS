<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
  case 'add':
    $krisan = "SELECT * FROM krisan";
    $content = "views/krisan/tambah_krisan.php";
    include_once 'views/template.php';
    break;
  case 'save':
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // update
      if (!empty($_POST['id_krisan'])) {
        $sql = "UPDATE krisan SET id_krisan='$_POST[id_krisan]', nama='$_POST[nama]', kritik='$_POST[kritik]', saran='$_POST[saran]' WHERE id_krisan='$_POST[id_krisan]'";
      } else {
        // save
        $sql = "INSERT INTO krisan (id_krisan, nama, kritik, saran) 
        VALUES ('$_POST[id_krisan]', '$_POST[nama]', '$_POST[kritik]', '$_POST[saran]')";
      }

      if ($conn->query($sql) === TRUE) {
        // jika berhasil query
        header('Location: index.php?mod=krisan');
      } else {
        $err['msg'] = "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      $err['msg'] = "Data belum diisi";
    }
    if (isset($err)) {
      // jika ada error
      $krisan = "SELECT * FROM krisan";
      $content = "views/krisan/tambah_krisan.php";
      include_once 'views/template.php';
    }
    break;
  case 'edit':
    $krisan = "SELECT * FROM krisan WHERE id_krisan='$_GET[id]'";
    $krisan = $conn->query($krisan);
    $_POST = $krisan->fetch_assoc();
    $_POST['id_krisan'] = $_POST['id_krisan'];
    $content = "views/krisan/tambah_krisan.php";
    include_once "views/template.php";
    break;
  case 'delete':
    $krisan = "DELETE FROM krisan WHERE id_krisan='$_GET[id]'";
    $krisan = $conn->query($krisan);
    header('Location: index.php?mod=krisan');
    break;
  default:
    $sql = "SELECT * FROM krisan";
    $krisan = $conn->query($sql);
    $conn->close();
    $content = "views/krisan/krisan.php";
    include_once 'views/template.php';
}
