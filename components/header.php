<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <title>Creeze Cloth</title>
</head>

<?php
// inisialisasi session
session_start();

require './function/query.php';

if (isset($_SESSION['login'])) {
  $username = $_SESSION['username'];

  $user = query("SELECT * FROM users WHERE username = '$username'");
}
?>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-light bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">CREEZE
        <img src="" alt="" />
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Beranda <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>
        <div class="d-flex align-items-center my-2 my-lg-0">
          <div class="mx-2">
            <a href="index.php?menu=register">
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#register-form">Buat Akun</button>
            </a>
          </div>
          <div class="mx-2">
            <a href="index.php?menu=login">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#login-form">Login</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>