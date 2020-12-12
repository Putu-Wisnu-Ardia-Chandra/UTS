<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
  case 'add':
    $berita = "SELECT * FROM berita";
    $content = "views/berita/tambah_berita.php";
    include_once 'views/template.php';
    break;
  case 'save':
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // update
      if (!empty($_POST['id_berita'])) {
        $sql = "UPDATE berita SET id_berita='$_POST[id_berita]', judul='$_POST[judul]', isi='$_POST[isi]' WHERE id_berita='$_POST[id_berita]'";
      } else {
        // save
        $sql = "INSERT INTO berita (id_berita, judul, isi) 
        VALUES ('$_POST[id_berita]', '$_POST[judul]', '$_POST[isi]')";
      }

      if ($conn->query($sql) === TRUE) {
        header('Location: index.php?mod=berita');
      } else {
        $err['msg'] = "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      $err['msg'] = "Data belum diisi";
    }
    if (isset($err)) {
      $berita = "SELECT * FROM berita";
      $content = "views/berita/tambah_berita.php";
      include_once 'views/template.php';
    }
    break;
  case 'edit':
    $berita = "SELECT * FROM berita WHERE id_berita='$_GET[id]'";
    $berita = $conn->query($berita);
    $_POST = $berita->fetch_assoc();
    $_POST['id_berita'] = $_POST['id_berita'];
    $content = "views/berita/tambah_berita.php";
    include_once "views/template.php";
    break;
  case 'delete':
    $berita = "DELETE FROM berita WHERE id_berita='$_GET[id]'";
    $berita = $conn->query($berita);
    header('Location: index.php?mod=berita');
    break;
  default:
    $sql = "SELECT * FROM berita";
    $berita = $conn->query($sql);
    $conn->close();
    $content = "views/berita/berita.php";
    include_once 'views/template.php';
}
