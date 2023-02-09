<?php
include './config/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Ngemovie</title>
</head>

<body>

    <div class="container-all">

        <div class="wrapper-banner">
            <div class="gradient"></div>
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
            <img src="./assets/banner.png" alt="">
        </div>
        <div class="wrapper-navbar">
            <nav>
                <div class="wrapper-title">
                    MKDIR
                </div>
                <ul>
                    <li>

                        <a href="<?php echo $baseUrl  ?>/">
                            <div>Home</div>
                            <span class="material-symbols-outlined">
                                home_app_logo
                            </span>
                        </a>
                    </li>
                    <li><a href="">
                            <div>Genre</div>
                            <span class="material-symbols-outlined">
                                movie
                            </span>
                        </a></li>
                    <li><a href="">
                            <div>Country</div>
                            <span class="material-symbols-outlined">
                                flag_circle
                            </span>
                        </a></li>
                </ul>
            </nav>
        </div>
        <?php
        error_reporting(0);

        include './log/log.php';




        $page = $_GET['page'] ?? "home";

        switch ($page) {
            case "home":
                include "./post/post.php";
                break;
            case "genre":
                include "login.php";
                break;
            case "login":
                include "./login/login.php";
                break;
            case "id":
                include "./post/postbyId.php";
                break;
                // case "id":
                //     include "./post/postbyId.php";
                //     break;
                // default:
                //     include "./pagenotfound.php";
                //     break;
        }

        ?>

    </div>
</body>
<script>
    document.cookie = "resolution=" + screen.width + " x " + screen.height;
    document.cookie = "device=" + navigator.platform;
</script>

</html>