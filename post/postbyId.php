<div class="wrapper-detail">
    <?php
    // include '../config/config.php';
    // include './post/postClass.php';


    $post = new PostClass($conn);


    $key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
    $salt = sha1($key);


    // Ambil id dari URL
    $id = $_GET['id'];

    $salt_length = strlen($salt);

    $decoded = base64_decode($id);

    $salt_plain_id = substr($decoded, $salt_length, strlen($decoded) - 2 * $salt_length);


    $dcry = base64_decode($salt_plain_id);


    

    $result = $post->postById($dcry);

    if (!$result) {
        // echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
        exit;
    }
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    ?>
        <div class="wrapper-img">
            <div class="title"><?php echo $data['title'] ?></div>
            <img src="./db/images/<?php echo $data['image']; ?>" class="img">
        </div>
        <div class="wrapper-movie-link">
            <div class="card-movie">
                <div class="wrapper-title-years">
                    <div class="title">Title : <?php echo $data['title'] ?></div>
                    <div class="years">Desc : <?php echo $data['desc'] ?></div>
                    <div class="years">Years : <?php echo date("Y", strtotime($data['date'])); ?></div>
                    <div class="years">Genre : <?php echo $data['name'] ?></div>
                </div>
            </div>
            <?php
            $result2 = $post->linkPostById($dcry);

            $updateViews = $post->updateViews($dcry);

            $getEpisode = $post->getEpisode($dcry);

?>
               

            <div class="container-link">
                <?php while ($dataLink = mysqli_fetch_assoc($result2)) { ?>
                    <!-- <?php var_dump($dataLink) ?> -->
                    <div class="wrapper-card-link" style="display: <?php if(!$dataLink['quality']){echo 'none';} ?>;">
                        <div class="wrapper-quality">
                            <div style="display:<?php echo $data['tipe']=== 'Series'?'':'none'; ?>"><?php echo $data['tipe'] === "Series"? 'Episode '.$dataLink['episode']:''; ?></div>
                            <div><?php echo $dataLink['quality'] ?></div>
                        </div>
                        <div class="wrapper-link-quality">
                            <a href="<?php echo $dataLink['GD'] ?>" target="_blank"  style="display: <?php if(!$dataLink['GD']){echo 'none !';} ?>;">GD</a>
                            <a href="<?php echo $dataLink['UTB'] ?>" target="_blank" style="display:  <?php if(!$dataLink['UTB']){echo 'none';} ?>;">UTB</a>
                            <a href="<?php echo $dataLink['MG'] ?>" target="_blank" style="display: <?php if(!$dataLink['MG']){echo 'none';} ?>;">MG</a>
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