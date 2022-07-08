<?php 
function content($menu) {
  $cek = trim($menu);
  if($cek == '') {
    $file = 'beranda.php';
  }
  if($cek == 'beranda') {
    $file = 'beranda.php';
  }
  if($cek == 'profil') {
    $file = 'profile.php';
  }
  if($cek == 'edit') {
    $file = 'edit.php';
  }
  if($cek == 'login') {
    $file = 'login.php';
  }
  if($cek == 'register') {
    $file = 'register.php';
  }
  return $file;
}
?>