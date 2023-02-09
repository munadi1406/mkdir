<div class="wrapper-detail">
    <?php
    // include '../config/config.php';
    session_start();
    $key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
    $salt = sha1($key);


    // Ambil id dari URL
    $id = $_GET['id'];

    $salt_length = strlen($salt);

    $decoded = base64_decode($id);

    $salt_plain_id = substr($decoded, $salt_length, strlen($decoded) - 2 * $salt_length);


    $dcry = base64_decode($salt_plain_id);


    $query = "SELECT f.title, f.desc, f.date, f.image, g.name ,l.* FROM films f JOIN genre g ON f.film_id = g.id_films JOIN link l on f.film_id = l.film_id WHERE f.film_id = '$dcry' ";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
        exit;
    }
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    ?>
        <div class="wrapper-img">
        <div class="title">Title : <?php echo $data['title'] ?></div>
            <img src="./db/images/<?php echo $data['image']; ?>" class="img">
        </div>
            <div class="wrapper-movie-link">
            <div class="card-movie">
                <div class="wrapper-title-years">
                    <div class="title">Title : <?php echo $data['title'] ?></div>
                    <div class="years">desc : <?php echo $data['desc'] ?></div>
                    <div class="years">date : <?php echo $data['date'] ?></div>
                    <div class="years">Genre : <?php echo $data['name'] ?></div>
                </div>
            </div>
            <?php
            $query2 = "SELECT * FROM link where film_id = '$dcry' ";
            $result2 = mysqli_query($conn, $query2);
            ?>
                <div class="container-link">
            <?php while ($data = mysqli_fetch_assoc($result2)) { ?>
                    <div class="wrapper-card-link">
                        <div class="wrapper-quality">
                            <div><?php echo $data['quality']?></div>                            
                        </div>
                        <div class="wrapper-link-quality">
                            <a href="<?php echo $data['GD'] ?>" target="_blank">GD</a>
                            <a href="<?php echo $data['UTB'] ?>" target="_blank">UTB</a>
                            <a href="<?php echo $data['MG'] ?>" target="_blank">MG</a>

                        </div>
                    </div>
                    <?php } ?>
                </div>
        </div>
    <?php
    } else {
        echo "Data tidak ditemukan";
    }
    mysqli_close($conn);
    ?>
</div>