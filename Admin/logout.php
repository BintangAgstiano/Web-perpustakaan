<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:../login/registrasi.php");
}
session_destroy();
session_unset();
header("location:../login/registrasi.php");