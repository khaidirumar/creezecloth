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
  if($cek == 'dashboard') {
    $file = 'dashboard.php';
  }
  if($cek == 'delete-carousel') {
    $file = 'delete-carousel.php';
  }
  if($cek == 'edit-carousel') {
    $file = 'edit-carousel.php';
  }
  return $file;
}
?>