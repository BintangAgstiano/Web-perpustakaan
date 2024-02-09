<?php
require "../koneksi/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM buku ");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon/starbook.png">
    <title>B'Library</title>
    <link rel="stylesheet" href="css/style.css">
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
            <a href="registrasiUser.php" class="log-in">
                <i class="fa-solid fa-right-from-bracket fa-lg" style="color: rgb(201, 201, 201)f;"></i>Login
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
                        <button id="btn-beli">Beli</button>
                        <button id="btn-sewa">Sewa</button>
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
                    <input type="text" id="nama" name="nama" readonly placeholder="Enter your name">
                    <input type="email" id="email" name="email" readonly placeholder="Enter your email">
                    <input type="text" id="message" name="message" readonly placeholder="Enter your messege">
                    <button id="send" name="send">Send Now</button>
                </form>
            </div>
        </div>

    </div>

    <script src="js/index.js" ></script>
</body>

</html>

