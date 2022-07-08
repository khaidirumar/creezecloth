<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
</head>

<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');

$error = '';
$validate = '';
if( isset($_SESSION['user']) ) header('Location: index.php?menu=input');
//mengecek apakah data username yang diinpukan user kosong atau tidak
if( isset($_POST['submit']) ){
        
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $mobile    = stripslashes($_POST['mobile']);
        $mobile    = mysqli_real_escape_string($con, $mobile);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email))  && !empty(trim($mobile)) && !empty(trim($password)) && !empty(trim($repass))){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($name,$con) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO users (username,name,email, password, mobile ) VALUES ('$username','$name','$email','$pass', '$mobile')";
                    $result   = mysqli_query($con, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        header('Location: index.php?menu=beranda');
                    
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }else{
                        $error =  'Username sudah terdaftar !!';
                }
            }else{
                $validate = 'Password tidak sama !!';
            }
            
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 

    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$con){
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
    }
?>
<section class="container-fluid my-4">
    <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
    <div class="card my4">
        <div class="card-body">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form class="form-container" action="index.php?menu=input" method="POST">
                        <h4 class="text-center font-weight-bold"> COBA INPUT </h4>
                        <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                        <?php } ?>
        
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Alamat Email</label>
                            <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp"
                                placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Nomor HP/Telepon</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" aria-describeby="emailHelp"
                                placeholder="Masukkan nomor HP">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan username">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" id="InputPassword" name="password"
                                placeholder="Password">
                            <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Re-Password</label>
                            <input type="password" class="form-control" id="InputRePassword" name="repassword"
                                placeholder="Re-Password">
                            <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                            <?php }?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
</html>