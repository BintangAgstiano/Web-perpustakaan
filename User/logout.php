<?php
session_start();
if (!isset($_SESSION['loginUser'])) {
    header("location:index.php");
}
session_destroy();
session_unset();
header("location:index.php");