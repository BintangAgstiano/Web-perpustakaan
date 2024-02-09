<?php 
require "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("location:../login/registrasi.php");
}
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM buku WHERE id_buku=$id");
header('location:index.php');
?>