<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Ngemovie</title>
</head>

<body>
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
    <nav>
        <div class="wrapper-title">
            MKDIR
        </div>
        <ul>
            <li><a href="/movie/">Home</a></li>
            <li><a href="">Genre</a></li>
            <li><a href="">Country</a></li>
        </ul>
    </nav>
    <?php
    error_reporting(0);

    include './config/config.php';


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
        default:
            include "./pagenotfound.php";
            break;
    }
    ?>
</body>

</html>