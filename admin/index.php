<?php
session_start();
include_once '../config/Config.php';
$con = new Config();
if ($con->auth()) {
  //panggil fungsi
  switch (@$_GET['mod']) {
    case 'pegawai':
      include_once 'controller/pegawai.php';
      break;
    case 'masyarakat':
      include_once 'controller/masyarakat.php';
      break;
    case 'berita':
      include_once 'controller/berita.php';
      break;
    case 'krisan':
      include_once 'controller/krisan.php';
      break;
    default:
      include_once 'controller/pegawai.php';
  }
} else {
  //panggil cont login
  include_once 'controller/login.php';
}
