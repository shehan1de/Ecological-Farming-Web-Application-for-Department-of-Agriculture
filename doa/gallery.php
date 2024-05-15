<?php

include "database.php";
session_start();

$gallerySql = mysqli_query($conn, "SELECT * FROM `gallery` WHERE 1 ORDER BY gallery_id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/gallery.css">
    <link rel="stylesheet" href="style/profile-menu.css">


    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        .nav-2-content-1 ul li:nth-child(7) a {
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

                    <?php

                    if ($gallerySql) {
                        if (mysqli_num_rows($gallerySql) > 0) {

                            $rowCount = mysqli_num_rows($gallerySql);
                            $breakOuterLoop = false;

                            // echo $rowCount % 4;
                    
                            for ($g = 0; $g < $rowCount; $g++) {

                                echo '<div class="gallery-content">';

                                $n = true;

                                for ($i = 0; $i < 4; $i++) {

                                    $galleryRow = mysqli_fetch_array($gallerySql);

                                    if ($galleryRow && !empty($galleryRow['gallery_id'])) {

                                        $id = $galleryRow['gallery_id'];
                                        $title = $galleryRow['title'];
                                        $description = $galleryRow["description"];
                                        $date = $galleryRow['date'];
                                        $image = $galleryRow["image"];

                                        if ($n == true) {

                                            if ($i == 0) {

                                                echo '
                                                    <div class="gallery-content-1">
                                                    <div class="gallery-card" onclick="window.open(\'' . $image . '\', \'_blank\');">
                                                    <img src=' . $image . ' alt="">
                                                </div>
                                                    ';

                                            } elseif ($i == 1) {
                                                echo '
                                                    <div class="gallery-card" onclick="window.open(\'' . $image . '\', \'_blank\');">
                                                        <img src=' . $image . ' alt="">
                                                    </div>
                                                </div>
                                            ';

                                                $n = false;
                                            }

                                        } else {

                                            if ($i == 2) {
                                                echo '
                                                        <div class="gallery-content-2">
                                                        <div class="gallery-card" onclick="window.open(\'' . $image . '\', \'_blank\');">
                                                        <img src=' . $image . ' alt="">
                                                    </div>
                                                    ';
                                            } elseif ($i == 3) {
                                                echo '
                                                <div class="gallery-card" onclick="window.open(\'' . $image . '\', \'_blank\');">
                                                <img src=' . $image . ' alt="">
                                            </div>
                                                    </div>
                                            ';
                                                $n = true;
                                            }

                                        }

                                    } else {
                                        echo '</div>';
                                        $breakOuterLoop = true;
                                        break;
                                    }

                                }
                                echo '</div>';

                                if ($breakOuterLoop) {
                                    break;
                                }

                            }

                        }
                    }

                    ?>





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