<?php

include "database.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/seeds.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(9) a {
            color: var(--hover-link);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="content">
            <?php
            include "menu.php";
            ?>
            <?php
            include "nav.php";
            ?>
            <section>
                <div class="box">
                    <div class="seeds">
                        <div class="brnaches-title">

                            <div class="section-header-content">
                                <div class="top-to-bottom-line"></div>
                                <h3>Seeds Location</h3>
                                <h1>Find us: Seed pick up locations across Sri Lanka
</h1>
                            </div>
                        </div>
                        <div class="seeds-content revealBottomToTop reveal">
                            <div class="seeds-content-1 revealLeftToRight reveal">
                                <div class="section-header-content">
                                    <div class="top-to-bottom-line"></div>
                                    <h3>Location</h3>
                                </div>
                                <div class="location-content">
                                    <div class="location-content-1">
                                        <div class="location-list-1">
                                            <ul>
                                                <li>Colombo</li>
                                                <li>Gampaha</li>
                                                <li>Kalutara</li>
                                                <li>Kandy</li>
                                                <li>Matale</li>
                                                <li>Galle</li>
                                                <li>Matara</li>
                                                <li>Hambantota</li>
                                                <li>Jaffna</li>
                                                <li>Kilinochchi</li>
                                                <li>Mannar</li>
                                                <li>Vavuniya</li>

                                            </ul>
                                        </div>
                                        <div class="location-list-2">
                                            <ul>
                                                <li>Mullaitivu</li>
                                                <li>Ampara</li>
                                                <li>Trincomalee</li>
                                                <li>Kurunegala</li>
                                                <li>Puttalam</li>
                                                <li>Anuradhapura</li>
                                                <li>Polonnaruwa</li>
                                                <li>Badulla</li>
                                                <li>Moneragala</li>
                                                <li>Ratnapura</li>
                                                <li>Kegalle</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <div class="location-content-2">
                                        <div class="location-list-3"></div>
                                        <div class="location-list-4"></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="seeds-content-2 revealRightToLeft reveal">
                                <div class="location-search">
                                    <div class="search-bar">
                                        <input type="text" id="searchInput" placeholder="Search Locaiton">
                                        <!-- <input type="submit" value="Search"> -->
                                    </div>
                                    <!-- <div class="search-result">
                                        <h2>Colombo</h2>
                                       
                                        <div class="search-result-contact">
                                            <i class="ri-customer-service-2-line"></i>&nbsp;
                                            <a href="tel:+94112800200">011 2 800 200</a>
                                        </div>
                                        <div class="search-result-email">
                                            <i class="ri-mail-line"></i>&nbsp;
                                            <p><a href="mailto:safedrive@gmail.com">safedrive@gmail.com</a></p>
                                        </div>
                                    </div> -->
                                    <div class="map">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37680.357015495225!2d79.84260162102181!3d6.9312224047440925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2599d2f5fed2b%3A0x2cf99f74d4c89f54!2sFAJEE%20COIN%20WORLD!5e0!3m2!1sen!2slk!4v1687278071811!5m2!1sen!2slk"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                    <div class="search-content" id="search-content">
                                        <ul id="list">
                                            <li>Colombo</li>
                                            <li>Gampaha</li>
                                            <li>Kalutara</li>
                                            <li>Kandy</li>
                                            <li>Matale</li>
                                            <li>Galle</li>
                                            <li>Matara</li>
                                            <li>Hambantota</li>
                                            <li>Jaffna</li>
                                            <li>Kilinochchi</li>
                                            <li>Mannar</li>
                                            <li>Vavuniya</li>
                                            <li>Mullaitivu</li>
                                            <li>Ampara</li>
                                            <li>Trincomalee</li>
                                            <li>Kurunegala</li>
                                            <li>Puttalam</li>
                                            <li>Anuradhapura</li>
                                            <li>Polonnaruwa</li>
                                            <li>Badulla</li>
                                            <li>Moneragala</li>
                                            <li>Ratnapura</li>
                                            <li>Kegalle</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
        include "footer.php"
            ?>
    </div>
    <script src="js/script.js"></script>
    <script src="js/seeds.js"></script>
</body>

</html>