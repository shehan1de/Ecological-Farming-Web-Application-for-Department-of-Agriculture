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
    <link rel="stylesheet" href="style/about-us.css">
    <link rel="stylesheet" href="style/profile-menu.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(5) a {
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
                    <div class="about-content">
                        <div class="section-header-content">
                            <div class="top-to-bottom-line"></div>
                            <h3>About Us</h3>
                        </div>
                        <p>
                            Welcome to the Department of Agriculture (DOA), a vital institution at the heart of Sri
                            Lanka's agricultural landscape. With a legacy spanning generations, the DOA is committed to
                            fostering sustainable agricultural practices, ensuring food security, and empowering farmers
                            across the nation.
                        </p>

                        <div class="about-details">

                            <div class="about-content-1">
                                <img src="images/product-1.jpg" alt="">
                            </div>
                            <div class="about-content-2">
                                <div class="section-header-content">
                                    <div class="top-to-bottom-line"></div>
                                    <h3>Our Mission</h3>
                                </div>
                                <p>
                                    Our Mission

                                    "Our mission at the Department of Agriculture (DOA) is to serve as the driving force
                                    behind Sri Lanka's agricultural progress. We are dedicated to pioneering innovative
                                    solutions that bolster the nation's agricultural sector, ensuring food security, and
                                    empowering our farmers.
                                    <br><br>
                                    Our primary goal is to research, develop, and disseminate cutting-edge agricultural
                                    technologies and practices that maximize crop yields, improve livestock management,
                                    and protect our environment. We believe that through responsible stewardship of our
                                    resources, we can achieve a sustainable and resilient agricultural ecosystem.
                                    <br><br>
                                    Our mission extends beyond research; we actively engage with farming communities,
                                    providing them with the guidance, training, and support they need to thrive. We are
                                    committed to fostering an informed and educated farming populace, recognizing that
                                    knowledge is the cornerstone of progress.
                                    Collaboration is central to our mission. We work closely with policymakers,
                                    advocating for agricultural policies that prioritize the well-being of our farmers
                                    and the long-term prosperity of our nation. Our insights and expertise contribute to
                                    the development of responsible and sustainable agricultural practices.
                                    <br><br>
                                    Above all, our mission is underpinned by a steadfast commitment to sustainability.
                                    We champion ecological farming practices that safeguard the soil, water, and
                                    climate. We are dedicated to promoting biodiversity, reducing chemical inputs, and
                                    ensuring that our agricultural endeavors leave a positive impact on our environment.
                                    <br><br>
                                    At DOA, our mission is to cultivate not just crops but a brighter future for Sri
                                    Lanka's agricultural landscape. Together, we sow the seeds of progress, nurture
                                    growth, and harvest a sustainable tomorrow."
                                </p>
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
</body>

</html>