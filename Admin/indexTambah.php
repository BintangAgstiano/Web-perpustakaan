<?php
require "../koneksi/koneksi.php";

session_start();
if (!isset($_SESSION['login'])) {
    header("location:../login/registrasi.php");
}
if (isset($_POST['add'])) {

    function upload()
    {
        $namaFile = $_FILES["img"]["name"];
        $type = $_FILES["img"]["type"];
        $error = $_FILES["img"]["error"];
        $tmp = $_FILES["img"]["tmp_name"];

        if ($error == 4) {
            echo "<script>alert('Upload foto terlebih dahulu')</script>";
            return false;
        }

        $jenisType = array("png", "jpg", "avif", "jfif", "jpeg","webp");
        $pecah = explode(".", $namaFile);
        $ambil = strtolower(end($pecah));

        if (!in_array($ambil, $jenisType)) {
            echo "<script>alert('Type file tidak valid')</script>";
            return false;
        }
        $namaFile = uniqid();
        $namaFile .= ".";
        $namaFile .= $ambil;

        move_uploaded_file($tmp, "img/" . $namaFile);
        return $namaFile;
    }

    $judul = htmlspecialchars($_POST["judul"]);
    $img = upload();
    if($img == true){

        if ($judul !== "") {
            $insert = mysqli_query($conn, "INSERT INTO buku VALUES(null,'$judul','$img')");
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('List buku berhasil di tambahkan')</script>";
                echo "<script>document.location.href='index.php'</script>";
                // header("location:index.php");
            }
        } else {
            if ($img !== false) {
                echo "<script>alert('Judul tidak boleh kosong')</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleTambah.css">
    <script src="https://kit.fontawesome.com/33886cee1c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="nav-form">
            TAMBAH DATA BUKU
        </div>
        <div class="contentForm">
            <div class="inputText">
                <div class="text">Judul Buku</div>
                <input type="text" placeholder="Masukkan judul" name="judul" id="judul"">
            </div>
            <div class="inputFile">
                <div class="text">Upload File</div>
                <input type="file" name="img" id="img">
            </div>
        </div>
        <button type="submit" name="add" id="btn-add">Kirim</button>
    </form>

    </div>
</body>

</html>