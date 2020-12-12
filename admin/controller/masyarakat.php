<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
  case 'add':
    $pendidikan = "SELECT * FROM ref_pendidikan";
    $pendidikan = $conn->query($pendidikan);
    $sql = "SELECT * FROM ref_pekerjaan";
    $pekerjaan = $conn->query($sql);
    $content = "views/masyarakat/tambah_masyarakat.php";
    include_once 'views/template.php';
    break;
  case 'save':
    // validasi
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (empty($_POST['nama_masyarakat'])) {
        $err['nama_masyarakat'] = "Nama Wajib";
      }
      if (!is_numeric($_POST['no_kk'])) {
        $err['no_kk'] = "No KK Wajib Angka";
      }
      // validasi file
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
            $_POST['photo'] = $photo;
          } else {
            $err["fileToUpload"] = "Sorry, there was an error uploading your file.";
          }
        }
      }
      // jika tak ada error
      if (!isset($err)) {
        if (!empty($_POST['id_masyarakat'])) {
          //update
          if (isset($_POST['photo'])) {
            $sql = "UPDATE masyarakat SET id_masyarakat='$_POST[id_masyarakat]', photo = '$_POST[photo]', nama_masyarakat = '$_POST[nama_masyarakat]', no_kk = '$_POST[no_kk]', id_pendidikan = '$_POST[id_pendidikan]', id_pekerjaan = '$_POST[id_pekerjaan]' WHERE id_masyarakat= '$_POST[id_masyarakat]'";
          } else {
            $sql = "UPDATE masyarakat SET id_masyarakat='$_POST[id_masyarakat]', nama_masyarakat = '$_POST[nama_masyarakat]', no_kk = '$_POST[no_kk]', id_pendidikan = '$_POST[id_pendidikan]', id_pekerjaan = '$_POST[id_pekerjaan]' WHERE id_masyarakat= '$_POST[id_masyarakat]'";
          }
        } else {
          //save
          if (isset($_POST['photo'])) {
            $sql = "INSERT INTO masyarakat (id_masyarakat, photo, nama_masyarakat, no_kk, id_pendidikan, id_pekerjaan)
                VALUES('$_POST[id_masyarakat]', '$_POST[photo]', '$_POST[nama_masyarakat]', '$_POST[no_kk]', '$_POST[id_pendidikan]', '$_POST[id_pekerjaan]')";
          } else {
            $sql = "INSERT INTO masyarakat (id_masyarakat, nama_masyarakat, no_kk, id_pendidikan, id_pekerjaan)
                VALUES('$_POST[id_masyarakat]', '$_POST[nama_masyarakat]', '$_POST[no_kk]', '$_POST[id_pendidikan]', '$_POST[id_pekerjaan]')";
          }
        }
        if ($conn->query($sql) === TRUE) {
          header('Location: index.php?mod=masyarakat');
        } else {
          $err['msg'] = "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    } else {
      $err['msg'] = "tidak diijinkan";
    }
    if (isset($err)) {
      $pendidikan = "SELECT * FROM ref_pendidikan";
      $pendidikan = $conn->query($pendidikan);
      $sql = "SELECT * FROM ref_pekerjaan";
      $pekerjaan = $conn->query($sql);
      $content = "views/masyarakat/tambah_masyarakat.php";
      include_once 'views/template.php';
    }
    break;
  case 'edit':
    $masyarakat = "SELECT * FROM masyarakat WHERE id_masyarakat='$_GET[id]'";
    $masyarakat = $conn->query($masyarakat);
    $_POST = $masyarakat->fetch_assoc();
    $_POST['id_masyarakat'] = $_POST['id_masyarakat'];
    $pendidikan = "SELECT * FROM ref_pendidikan";
    $pendidikan = $conn->query($pendidikan);
    $sql = "SELECT * FROM ref_pekerjaan";
    $pekerjaan = $conn->query($sql);
    $content = "views/masyarakat/tambah_masyarakat.php";
    include_once 'views/template.php';
    break;
  case 'delete':
    $masyarakat = "DELETE FROM masyarakat WHERE id_masyarakat='$_GET[id]'";
    $masyarakat = $conn->query($masyarakat);
    header('Location: index.php?mod=masyarakat');
    break;
  default:
    $sql = "SELECT masyarakat.nama_masyarakat, masyarakat.id_masyarakat, masyarakat.photo, masyarakat.id_pendidikan, masyarakat.id_pekerjaan, masyarakat.no_kk, ref_pendidikan.pendidikan, ref_pekerjaan.pekerjaan
    FROM masyarakat  
    INNER JOIN ref_pendidikan
    ON masyarakat.id_pendidikan = ref_pendidikan.id_pendidikan
    INNER JOIN ref_pekerjaan
    ON masyarakat.id_pekerjaan = ref_pekerjaan.id_pekerjaan";
    $masyarakat = $conn->query($sql);
    $conn->close();
    $content = "views/masyarakat/masyarakat.php";
    include_once 'views/template.php';
}
