    <?php
    $key = "mksnjdfhryeu73436261823546tgdvsbjcmklfigutyrtr49!@#$59423nvldkflsihgrugyqeccdc";
    $salt = sha1($key);

    ?>
    <div class="wrapper-content">
        <?php
        include './config/config.php';
        session_start();
        $query = "SELECT * FROM films where status = 'show' ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);
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