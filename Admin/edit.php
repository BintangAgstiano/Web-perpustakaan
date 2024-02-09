<?php
require "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("location:../login/registrasi.php");
}
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id");
if(mysqli_num_rows($query)==0){
    header('location:index.php');
    exit;
}
$fetch = mysqli_fetch_assoc($query);

if (isset($_POST['change'])) {

    function upload()
    {
        global $fetch;
        $namaFile = $_FILES["img"]["name"];
        $type = $_FILES["img"]["type"];
        $error = $_FILES["img"]["error"];
        $tmp = $_FILES["img"]["tmp_name"];

        if ($_FILES['img']['error'] === 4) {
            $img = $fetch['img'];
            return $img;
        } else {


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
    }

    $judul = htmlspecialchars($_POST["judul"]);
    $img = upload();
    if ($img == true) {
        if ($judul !== "") {
            $update = mysqli_query($conn, "UPDATE buku SET judul='$judul',img='$img' WHERE id_buku=$id");
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
    <link rel="stylesheet" href="css/styleEdit.css">
    <script src="https://kit.fontawesome.com/33886cee1c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="nav-form">
                EDIT DATA BUKU
            </div>
            <div class="contentForm">
                <div class="inputText">
                    <div class="text">Judul Buku</div>
                    <input type="text" placeholder="Masukkan judul" name="judul" id="judul" value="<?= $fetch['judul'] ?>">
                </div>
                <div class="inputFile">
                    <div class="text">Upload File</div>
                    <input type="file" name="img" id="img">
                </div>
            </div>
            <button type="submit" name="change" id="btn-add">Ubah</button>
        </form>

        <div class="bg2">
            <img src="img/<?= $fetch['img'] ?>">
            <p><?= $fetch['img'] ?></p>
        </div>
    </div>
</body>

</html>