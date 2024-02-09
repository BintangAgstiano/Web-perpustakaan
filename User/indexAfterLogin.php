<?php
require "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION["loginUser"])) {
    header("location:registrasiUser.php");
}
$query = mysqli_query($conn, "SELECT * FROM buku ");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon/starbook.png">
    <title>B'Library</title>
    <link rel="stylesheet" href="css/styleAfterLogin.css">
    <script src="https://kit.fontawesome.com/33886cee1c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav>
            <div class="logo"><span class="s-logo1">B</span>'Library</div>
            <nav-link>
                <a href="#bagian1">Home</a>
                <a href="#bagian2">Books</a>
                <a href="#bagian3">Contact</a>
            </nav-link>
            <a href="logout.php" class="logout">
                <i class="fa-solid fa-right-from-bracket fa-lg" style="color: rgb(201, 201, 201)f;"></i>Logout
            </a>
        </nav>

        <!-- Bagian 1 -->
        <div class="b1">
            <div id="bagian1"></div>
            <div class="col">
                <div class="logo2"><span class="s-logo2">B</span>'Library</div>
                <div class="bio">Have you ever felt invited into a world filled with adventure, imagination, and wonder? Now is the time to step into our storybook warehouse, housing thousands of amazing tales from all corners of the world!Discover the beauty within fantasy stories that transport you to magical lands, or confront deep realities through literary novels. Every book is a window to a new world, ready to be explored.
                </div>
                <a href="#bagian2"><button class="btn1"><i class="fa-solid fa-arrow-down"></i></button></a>
            </div>
        </div>
        <!-- Bagian2 -->
        <div class="bg2">
            <div id="bagian2"></div>
            <div class="col2">
                <div class="categories">All Books</div>
                <form action="" method="post" id="form">
                    <input type="text" name="search" id="search" placeholder="Search Categories...">
                    <button type="submit" id="btnSearch" name="btnSearch">Search</button>
                </form>
            </div>
            <div class="col-card">
                <?php foreach ($query as $q) : ?>
                    <div class="card">
                        <img class="img" src="../Admin/img/<?= $q['img'] ?>" width="50" draggable="false">
                        <div class="judul"><?= $q['judul'] ?></div>
                        <button id="btn-beli">Buy</button>
                        <button id="btn-sewa">Rent</button>
                        <form action="" method="post">
                            <input type="hidden" name="buku" value="<?= $q['id_buku'] ?>">
                            <input type="hidden" name="foto" value="<?= $q['img'] ?>">
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
            <br><br><br><br>
        </div>

        <!-- Bagian3 -->
        <div class="b3">
            <div id="bagian3"></div>
            <div class="left">
                <div class="icon-addres">
                    <i id="icon-a" class="fa-solid fa-location-dot fa-2xl"></i>
                    <div class="addres">Address</div>
                    <div class="bio-address">Jl.Imam Bonjol Pegangsaan Timur No.55</div>
                </div>
                <div class="icon-phone">
                    <i id="icon-p" class="fa-solid fa-phone fa-2xl"></i>
                    <div class="phone">Phone</div>
                    <div class="bio-phone">+6287 9876 6789 098</div>
                    <div class="bio-phone2">+6287 9876 6789 098</div>
                </div>
                <div class="icon-email">
                    <i id="icon-e" class="fa-solid fa-envelope fa-2xl"></i>
                    <div class="email">Email</div>
                    <div class="bio-email">bintangagustiano4@gmail.com</div>
                    <div class="bio-email2">keyyybintang4@gmail.com</div>
                </div>
                <div class="line"></div>
            </div>
            <div class="right">
                <div class="lorem-judul">Send us a message</div>
                <div class="lorem-right">if you have any difficulty or any type of query related to this website, you can send me a message from here.its my pleasure to help you</div>
                <form action="" id="form-right" method="post">
                    <input type="text" id="nama" name="nama" placeholder="Enter your name">
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                    <input type="text" id="message" name="message" placeholder="Enter your messege">
                    <button type="submit" id="send" name="send">Send Now</button>
                </form>
            </div>
        </div>

    </div>

    <script src="../SA/sweetalert2.all.min.js"></script>
    <script>
        const btnBeli = document.getElementById('btn-beli');
        btnBeli.addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "The price this book is IDR 30,000. If you are sure, press the 'Sure' button",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Sure!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Success!",
                        text: "You have purchased this book,Check your cart !!",
                        icon: "success"
                    }).then(() => {
                        // Menggunakan AJAX untuk mengirim data ke server PHP
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                // Handle response from server if needed
                                <?php
                                $buku = $_POST['buku'];
                                $foto = $_POST['foto'];

                                // Lakukan pemrosesan data sesuai kebutuhan
                                echo '<pre>';
                                var_dump($buku);
                                echo '</pre>';
                                die;
                                ?>
                            }
                        };

                        // Kirim data ke server (misalnya, menggunakan metode POST)
                        xhr.open("POST", "indexAfterLogin.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                        var data = "buku=NamaBuku&foto=NamaFoto"; // Gantilah dengan data yang sesuai
                        xhr.send(data);

                    });
                }
            });

            <?php

            ?>
        });
    </script>
</body>

</html>