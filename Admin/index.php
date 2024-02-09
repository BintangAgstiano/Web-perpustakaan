<?php
require "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("location:../login/registrasi.php");
}

$Query = mysqli_query($conn, "SELECT * FROM buku");

$id = isset($_GET["id"]);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectEdit = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id");
    $fetch = mysqli_fetch_assoc($selectEdit);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/33886cee1c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="judul-nav"> <span class="span-judulnav">My</span> Admin</div>
        <div class="link-nav">
            <a href="">Data Buku</a>
            <a href="">Data Pembelian</a>
            <a href="">Data Penyewaan</a>
        </div>
        <a href="logout.php" class="log-out">
            <i class="fa-solid fa-right-from-bracket fa-lg" style="color: rgb(201, 201, 201)f;"></i>Logout
        </a>
    </nav>
    <br><br><br><br><br>

    <a href="indexTambah.php" class="tambahDataBuku">
        <button class="tambahDataBuku-content">+ Tambah Data Buku</button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <th id="nav-table" colspan="4">Data Table Buku</th>
        <tr>
            <th>Id_Buku</th>
            <th>Judul</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
        <?php $id = 1; ?>
        <?php foreach ($Query as $row) : ?>
            <tr>
                <td><?= $id++ ?></td>
                <td><?= $row['judul'] ?></td>
                <td><img src="img/<?= $row['img'] ?> " width="100"></td>
                <td><a class="edit" href="edit.php?id=<?= $row['id_buku'] ?>">Edit</a> | <a href="hapus.php?id=<?= $row['id_buku'] ?>" onclick="return confirm('Yakin Untuk Mengapus?')" >Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>



</body>



</html>