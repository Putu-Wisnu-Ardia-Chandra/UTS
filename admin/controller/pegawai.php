<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
  case 'add':
    $pendidikan = "select * FROM ref_pendidikan";
    $pendidikan = $conn->query($pendidikan);
    $sql = "select * FROM ref_spesialisasi";
    $spesialis = $conn->query($sql);
    $content = "views/pegawai/tambah_pegawai.php";
    include_once 'views/template.php';
    break;
  case 'save':
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      //validasi
      if (empty($_POST['nama_pegawai'])) {
        $err['nama_pegawai'] = "Nama Dokter Wajib";
      }
      if (!is_numeric($_POST['no_id'])) {
        $err['no_id'] = "No IDI Wajib Angka";
      }
      if (!is_numeric($_POST['id_pendidikan'])) {
        $err['id_pendidikan'] = "Pendidikan Wajib Terisi";
      }
      if (!is_numeric($_POST['id_spesialisasi'])) {
        $err['id_spesialisasi'] = "Pendidikan Wajib Terisi";
      }
      //validasi file
      if (!empty($_FILES['fileToUpload']["name"])) {
        $target_dir = "../media/";
        $photo = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $photo;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if ($check !== false) {
            $err["fileToUpload"] = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            $err["fileToUpload"] = "File is not an image.";
            $uploadOk = 0;
          }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          $err["fileToUpload"] = "Sorry, file already exists.";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1048576) {
          $err["fileToUpload"] = "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          $err["fileToUpload"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //$err["fileToUpload"] "The file" . htmlspecialchars (basename ($_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $_POST['photo'] = $photo;
            if (isset($_POST['photo_old']) && $_POST['photo_old'] != '') {
              unlink($target_dir . $_POST['photo_old']);
            }
          } else {
            $err["fileToUpload"] = "Sorry, there was an error uploading your file.";
          }
        }
      }
      if (!isset($err)) {
        $id_pegawai = $_SESSION['login']['id'];
        if (!empty($_POST['id_pegawai'])) {
          //update
          if (isset($_POST['photo'])) {
            $sql = "UPDATE pegawai SET nama_pegawai='$_POST[nama_pegawai]', jenis_kelamin = '$_POST[jenis_kelamin]', no_id='$_POST[no_id]', no_pegawai='$_POST[no_pegawai]',id_pendidikan='$_POST[id_pendidikan]',id_spesialisasi='$_POST[id_spesialisasi]', photo='$_POST[photo]' WHERE id_pegawai='$_POST[id_pegawai]'";
          } else {
            $sql = "UPDATE pegawai SET nama_pegawai='$_POST[nama_pegawai]', jenis_kelamin = '$_POST[jenis_kelamin]',no_id='$_POST[no_id]', no_pegawai='$_POST[no_pegawai]',id_pendidikan='$_POST[id_pendidikan]', id_spesialisasi='$_POST[id_spesialisasi]' WHERE id_pegawai='$_POST[id_pegawai]'";
          }
        } else {
          //save
          if (isset($_POST['photo'])) {
            $sql = "INSERT INTO pegawai (nama_pegawai, no_id, no_pegawai, jenis_kelamin, id_pendidikan,id_spesialisasi,photo)
            VALUES ('$_POST[nama_pegawai]','$_POST[no_id]','$_POST[no_pegawai]', '$_POST[jenis_kelamin]','$_POST[id_pendidikan]','$_POST[id_spesialisasi]', '$_POST[photo]')";
          } else {
            $sql = "INSERT INTO pegawai (nama_pegawai, no_id, no_pegawai, jenis_kelamin, id_pendidikan,id_spesialisasi) 
                    VALUES ('$_POST[nama_pegawai]','$_POST[no_id]','$_POST[no_pegawai]', '$_POST[jenis_kelamin]', '$_POST[id_pendidikan]','$_POST[id_spesialisasi]')";
          }
        }
        if ($conn->query($sql) === TRUE) {
          header('Location: index.php');
        } else {
          $err['msg'] = "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    } else {
      $err['msg'] = "tidak diijinkan";
    }
    if (isset($err)) {
      $pendidikan = "select * FROM ref_pendidikan";
      $pendidikan = $conn->query($pendidikan);
      $sql = "select * FROM ref_spesialisasi";
      $spesialis = $conn->query($sql);
      $content = "views/pegawai/tambah_pegawai.php";
      include_once 'views/template.php';
    }
    break;
  case 'edit':
    $pegawai = "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'";
    $pegawai = $conn->query($pegawai);
    $_POST = $pegawai->fetch_assoc();
    $_POST['no_id'] = $_POST['no_id'];
    $_POST['id_pegawai'] = $_POST['id_pegawai'];
    //var_dump($pegawai);
    $pendidikan = "SELECT * FROM ref_pendidikan";
    $pendidikan = $conn->query($pendidikan);
    $sql = "SELECT * FROM ref_spesialisasi";
    $spesialis = $conn->query($sql);
    $content = "views/pegawai/tambah_pegawai.php";
    include_once 'views/template.php';
    break;
  case 'delete';
    $pegawai = "DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'";
    $pegawai = $conn->query($pegawai);
    header('Location: index.php');
    break;
  default:
    $sql = "SELECT pegawai.nama_pegawai, pegawai.photo, pegawai.jenis_kelamin, pegawai.id_pegawai, pegawai.no_pegawai, ref_pendidikan.pendidikan,ref_spesialisasi.nama_spesialisasi FROM pegawai
        INNER JOIN ref_pendidikan ON pegawai.id_pendidikan=ref_pendidikan.id_pendidikan
        INNER JOIN ref_spesialisasi ON pegawai.id_spesialisasi=ref_spesialisasi.id_spesialisasi";
    $pegawai = $conn->query($sql);
    $conn->close();
    $content = "views/pegawai/pegawai.php";
    include_once 'views/template.php';
}
