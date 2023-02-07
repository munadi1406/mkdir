<div class="wrapper-detail">
    <?php
    include '../config/config.php';
    session_start();
    $key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
    $salt = sha1($key);


    // Ambil id dari URL
    $id = $_GET['id'];

    $salt_length = strlen($salt);

    $decoded = base64_decode($id);

    $salt_plain_id = substr($decoded, $salt_length, strlen($decoded) - 2 * $salt_length);


    $dcry = base64_decode($salt_plain_id);


    $query = "SELECT f.title, f.date, f.image, g.name FROM films f JOIN genre g ON f.film_id = g.id_films WHERE f.film_id = '$dcry'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

    ?>
        <img src="./db/images/<?php echo $data['image']; ?>" class="img">
        <div class="wrapper-movie-link">
            <div class="card-movie">
                <div class="wrapper-title-years">
                    <div class="title">Title : <?php echo $data['title'] ?></div>
                    <div class="years">desc : <?php echo $data['desc'] ?></div>
                    <div class="years">date : <?php echo $data['date'] ?></div>
                    <div class="years">Genre : <?php echo $data['name'] ?></div>
                </div>
            </div>
            <div class="container-link">
                <div class="wrapper-card-link">
                    <div class="wrapper-quality">
                        <div>1080</div>
                    </div>
                    <div class="wrapper-link-quality">
                        <a href="">GD</a>
                        <a href="">UTB</a>
                        <a href="">MG</a>
                    </div>
                </div>
                <div class="wrapper-card-link">
                    <div class="wrapper-quality">
                        <div>720</div>
                    </div>
                    <div class="wrapper-link-quality">
                        <a href="">GD</a>
                        <a href="">UTB</a>
                        <a href="">MG</a>
                    </div>
                </div>
                <div class="wrapper-card-link">
                    <div class="wrapper-quality">
                        <div>540</div>
                    </div>
                    <div class="wrapper-link-quality">
                        <a href="">GD</a>
                        <a href="">UTB</a>
                        <a href="">MG</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "Data tidak ditemukan";
    }
    mysqli_close($conn);
    ?>
</div>