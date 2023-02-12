<?php
include './config/config.php';
include './post/postClass.php';
$key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
$salt = sha1($key);

$post = new postClass($conn);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>Ngemovie</title>
</head>

<body>

    <div class="container-all">
        <div class="wrapper-banner">
            <!-- <div class="gradient"></div> -->
            <?php
            $resultRandom = $post->getRandomPost(12);
            while ($dataRandom = mysqli_fetch_assoc($resultRandom)) {

                $plain_id =  $dataRandom['film_id'];

                $enc = base64_encode($plain_id);

                $encrypted_id = base64_encode($salt . $enc . $salt);
            ?>
                <a href="?page=id&id=<?php echo $encrypted_id ?>">
                    <img src="./db/images/<?php echo $dataRandom['image']; ?>" class="img">
                </a>
            <?php } ?>
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
                    <li class="menu"><a href="#">
                            <div>Genre</div>
                            <span class="material-symbols-outlined">
                                movie
                            </span>
                        </a>
                        <ul class="">
                            <li><a href="?page=genre&genre=action">Action</a></li>
                            <li><a href="?page=genre&genre=Comedy">Comedy</a></li>
                            <li><a href="?page=genre&genre=drama">Drama</a></li>
                            <li><a href="?page=genre&genre=horror">Horror</a></li>
                            <li><a href="?page=genre&genre=sci-fi">Sci-Fi</a></li>
                            <li><a href="?page=genre&genre=romance">Romance</a></li>
                            <li><a href="?page=genre&genre=adventure">Adventure</a></li>
                            <li><a href="?page=genre&genre=fantasy">Fastasy</a></li>
                            <li><a href="?page=genre&genre=thriller">Thriller</a></li>
                            <li><a href="?page=genre&genre=mystery">Mystery</a></li>
                        </ul>
                    </li>
                    <li><a href="#">
                            <div>Tipe</div>
                            <span class="material-symbols-outlined">
                                drag_indicator
                            </span>
                        </a>
                        <ul>
                            <li><a href="?page=genre&genre=action">DRAKOR</a></li>
                            <li><a href="?page=genre&genre=Comedy">MOVIE</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <?php
        error_reporting(0);

        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);

        include './log/log.php';




        $page = $_GET['page'] ?? "home";

        switch ($page) {
            case "home":
                include "./post/post.php";
                break;
            case "genre":
                include "./post/postByGenre.php";
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
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    let swiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 'auto',
        mousewheel: {
            forceToAxis: true,
        },

    });
</script>
<script>
    document.cookie = "resolution=" + screen.width + " x " + screen.height;
    document.cookie = "device=" + navigator.platform;
</script>

</html>