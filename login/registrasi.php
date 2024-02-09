<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="container">
        <div class="judul">Registrasi</div>
        <form class="form" action="" method="post">
            <input type="text" name="username" id="username" placeholder="Input Username">
            <input type="password" name="password1" id="password1" placeholder="Input Password">
            <input type="password" name="password2" id="password2" placeholder="Confirm Password">
            <div class="parentCb">
                <div class="contentCb">
                    <input type="checkbox" name="cb" id="cb">
                   <label for="cb" id="showPassword">show password</label>
                </div>
            </div>
            <button type="submit" name="btn-registrasi" id="btn-registrasi">Sign Up</button>
            <div class="bio">Already have an account? <a href="login.php">Sign In</a></div>
        </form>
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
    <script src="js/registrasi.js"></script>
</body>
<?php
require "../koneksi/koneksi.php";
session_start();

if (isset($_SESSION['login'])) {
    header("location:../User/index.php");
}

if (isset($_POST['btn-registrasi'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 !== $password2) {
        // echo "<script>alert('confirmasi password tidak cocok')</script>";
        echo '<script>passwordInvalid();</script>';
    }

    $panggil = mysqli_query($conn, "SELECT * FROM tb_registrasi WHERE username='$username'");
    if (mysqli_fetch_assoc($panggil)) {
        echo "<script>usernameTersedia();</script>";
        return false;
    }

    $password1 = password_hash($password1, PASSWORD_DEFAULT);
    $tambahSQLUser = mysqli_query($conn, "INSERT INTO tb_registrasi VALUES(NULL,'$username','$password1','$password2')");
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['login'] = true;
        header("location:../Admin/index.php");
    }
}
?>

</html>