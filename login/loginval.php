<?php
include '../config/config.php';


if (isset($_POST['login'])) {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id_users'] = $row['id_users'];
        $_SESSION['role'] = $row['role'];
        $pass = md5($pass);
        if ($pass == $row["password"]) {
            $_SESSION['username'] = $row['username'];

            $cookieid = base64_encode($row['id_users']);
            setcookie('cid', $cookieid, time() + (86400 * 30), "/"); 




            $cookie = base64_encode($row['username']);
            setcookie('cnm', $cookie, time() + (86400 * 30), "/"); 

            echo '<script>
                alert("login berhasil");
                window.location="'. $baseUrl .'/db/?page=/";
             </script>';
        } else {
            echo '<script>
                alert("Masukkan Password Yang Benar...");
                window.location="/?page=login";
             </script>';
        }
    } else {
        echo '<script>
                alert("Akun Anda Tidak Ada !!!");
                window.location="/?page=login";
             </script>';
    }
    $error = true;
}
