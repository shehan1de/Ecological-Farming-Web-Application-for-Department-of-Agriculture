<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="profile-menu">
        <div class="nav-profile-header">
            <div class="nav-profile-close">
                <i class="ri-arrow-right-circle-line"></i>
            </div>
        </div>
        <?php
            if(!isset($_SESSION["user_id"])){
                echo'
                <a href="login.php" class="profile-menu-link">
                    <p><i class="ri-login-box-line"></i> Login</p>
                </a>
                <a href="signup.php" class="profile-menu-link">
                    <p><i class="ri-user-add-line"></i> Register</p>
                </a>
            ';
            }
        ?>
        <?php
            if(isset($_SESSION["user_id"])){

                echo'
                    <a href="profile.php" class="profile-menu-link">
                        <p><i class="ri-user-line"></i> Profile</p>
                    </a>
                ';

                if($_SESSION["user_type"] == "farmer"){

                    echo'
                        <a href="ad-history.php" class="profile-menu-link">
                            <p><i class="ri-megaphone-line"></i> Advertisement</p>
                        </a>
                        <a href="send-message.php" class="profile-menu-link">
                        <p><i class="ri-chat-3-line"></i> Send Message</p>
                    </a>
                    ';

                }elseif($_SESSION["user_type"] == "field_officer"){

                    echo'
                        <a href="view-message.php" class="profile-menu-link">
                            <p><i class="ri-chat-3-line"></i> View Message</p>
                        </a>
                    ';
                    
                }elseif($_SESSION["user_type"] == "admin"){

                    echo'
                        <a href="admin/index.php" class="profile-menu-link">
                            <p><i class="ri-megaphone-line"></i> Admin Panel</p>
                        </a>
                    ';
                }

                echo'
                    <a href="logout.php" class="profile-menu-link">
                        <p><i class="ri-logout-box-line"></i> Logout</p>
                    </a>
                ';

            }
        ?>
    </div>

</body>

</html>