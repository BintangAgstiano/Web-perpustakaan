<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="judul">Login</div>
        <form class="form" action="" method="post">
            <input type="text" name="username" id="username_login" placeholder="Input Username">
            <input type="password" name="password1" id="password1_login" placeholder="Input Password">
            <input type="password" name="password2" id="password2_login" placeholder="Confirm Password">
            <button type="submit" name="btn-login" id="btn_login">Sign In</button>
        </form>
        <div class="bio">Dont have account? <a href="registrasi.php">Sign Up</a></div>
    </div>

    <div class="parent-mb">
        <div class="message-box">
            <nav>
                <div class="judul-nav">Error</div>
                <div class="x">X</div>
            </nav>

            <div class="text-content">Username dan Password harus di isi !!</div>
            <button type="button" class="oke">Oke</button>
        </div>
    </div>

    <!-- js -->
    <script src="js/login.js"></script>

</body>

<?php
require "../koneksi/koneksi.php";
session_start();
if (isset($_SESSION["login"])) {
    header("location:../User/index.php");
}
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 !== $password2) {
        // echo "<script>alert('confirmasi password tidak cocok')</script>";
        echo '<script>passwordInvalid();</script>';
        return false;
    }

    $panggil = mysqli_query($conn, "SELECT * FROM tb_registrasi WHERE username='$username'");
    $result = mysqli_fetch_assoc($panggil);
    if (password_verify($password1, $result['password1'])) {
        header("location:../Admin/index.php");
        $_SESSION['login'] = true;
    } else {
        echo "<script>veifyPassword();</script>";
    }
}
?>

</html>