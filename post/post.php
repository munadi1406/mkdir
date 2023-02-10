<?php
$key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
$salt = sha1($key);
include '../config/config.php';

?>
<div class="wrapper-content">
    <div class="container-carousel">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $queryRandom = "SELECT * FROM films ORDER BY RAND() LIMIT 10;";
                $resultRandom = mysqli_query($conn, $queryRandom);
                while ($dataRandom = mysqli_fetch_assoc($resultRandom)) {

                    $plain_id =  $dataRandom['film_id'];

                    $enc = base64_encode($plain_id);

                    $encrypted_id = base64_encode($salt . $enc . $salt);
                ?>
                        <a href="?page=id&id=<?php echo $encrypted_id ?>" class="swiper-slide">
                                <img src="./db/images/<?php echo $dataRandom['image']; ?>" class="img">
                        </a>

                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-card">

        <?php

        session_start();

        $records_per_page = 12;
        $current_page = 1;
        if (isset($_GET['pages'])) {
            $current_page = (int)$_GET['pages'];
        }

        $start_from = ($current_page - 1) * $records_per_page;


        $query = "SELECT * FROM films where status = 'show' ORDER BY created_at DESC LIMIT $start_from, $records_per_page";
        $result = mysqli_query($conn, $query);

        $total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM films where status = 'show' "));
        $total_pages = ceil($total_records / $records_per_page);
        ?>
        <?php while ($data = mysqli_fetch_assoc($result)) {

            $plain_id =  $data['film_id'];

            $enc = base64_encode($plain_id);

            $encrypted_id = base64_encode($salt . $enc . $salt);
        ?>
            <a href="?page=id&id=<?php echo $encrypted_id ?>">
                <div class="card-movie">
                    <img src="./db/images/<?php echo $data['image']; ?>" class="img">
                    <div class="wrapper-title-years">
                        <div class="title"><?php echo $data['title'] ?></div>
                        <div class="years">
                            <?php echo date("Y", strtotime($data['date'])); ?>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
        <?php
        mysqli_close($conn);
        ?>
    </div>
</div>
<div class="container-pagination">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <li class="page-item <?php if ($i == $current_page) {
                                        echo 'active';
                                    } ?>">
                <a class="page-link" href="?page=home&pages=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>