<?php

$profileIcon = "images/profile-icon.jpg";

if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];

    $sql = mysqli_query($conn, "SELECT * FROM `user` WHERE user_id = '$user_id'");
    $row = mysqli_fetch_array($sql);

    if (is_array($row)) {
        if ($row['profile_url'] !== "null") {
            $profileIcon = $row['profile_url'];
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="nav-1">
            <div class="box-1">
                <div class="nav-1-content">
                    <div class="nav-1-content-0">
                        <div class="menu-icon">
                            <div class="menu-icon-line"></div>
                            <div class="menu-icon-line"></div>
                            <div class="menu-icon-line"></div>
                        </div>
                    </div>
                    <div class="nav-1-content-1">
                        <img src="images/doa-logo.png" alt="">
                    </div>
                    <div class="nav-1-content-2">
                        <div class="nav-1-content-2-search">
                            <input type="text" id="search-input" value="">
                            <button id="search-button"><i class="ri-search-line"></i></button>
                        </div>
                    </div>
                    <div class="nav-1-content-3">
                        <?php
                        if (!isset($_SESSION["user_id"])) {
                            echo "
                                    <div class='nav-1-content-3-content-1'>
                                        <button id='login'>Login</button>
                                        <button id='signup'>Register</button>
                                    </div>
                                    
                                    <div class='nav-1-content-3-content-2 mobile'>
                                        <button id='profile-icon-mobile'>
                                            <img src='$profileIcon' id='profile-icon-1'>
                                        </button>
                                    </div>
                                ";
                        }
                        ?>

                        <?php
                        if (isset($_SESSION["user_id"])) {
                            echo "
                                    <div class='nav-1-content-3-content-2'>
                                        <button id='profile-icon'>
                                            <img src='$profileIcon' id='profile-icon-2'>
                                        </button>
                                    </div>
                                ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-2">
            <div class="box-1">
                <div class="nav-2-content-1">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="coursers.php">Coursers</a>
                        </li>
                        <li>
                            <a href="products.php">Products</a>
                        </li>
                        <li>
                            <a href="news.php">News</a>
                        </li>
                        <li>
                            <a href="about-us.php">About Us</a>
                        </li>
                        <li>
                            <a href="contact-us.php">Contact Us</a>
                        </li>
                        <li>
                            <a href="gallery.php">Gallery</a>
                        </li>
                        <li>
                            <a href="consulting.php">Consulting</a>
                        </li>
                        <li>
                            <a href="seeds.php">Seeds</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-2-content-2">
                <ul>
                    <a href="index.php">
                        <li>Home</li>
                    </a>
                    <a href="coursers.php">
                        <li>Coursers</li>
                    </a>
                    <a href="products.php">
                        <li>Products</li>
                    </a>
                    <a href="news.php">
                        <li>News</li>
                    </a>
                    <a href="about-us.php">
                        <li>About Us</li>
                    </a>
                    <a href="contact-us.php">
                        <li>Contact Us</li>
                    </a>
                    <a href="gallery.php">
                        <li>Gallery</li>
                    </a>
                    <a href="consulting.php">
                        <li>Consulting</li>
                    </a>
                    <a href="seeds.php">
                        <li>Seeds</li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        document.getElementById('search-button').addEventListener("click", function () {
            var searchInput = document.getElementById('search-input').value;
            window.location.href = 'search.php?search=' + searchInput + '&pcn=product';
        });

    </script>
</body>

</html>