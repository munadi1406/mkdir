<?php
// include '../../config/config.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$genre = implode(",", $_POST['genre']);

$id_films = $_POST['film_id'];


$query = "SELECT * FROM films WHERE film_id = $id_films";
$result = mysqli_query($conn, $query);
$film = mysqli_fetch_assoc($result);
$file_name = $film['image'];
$image = $_FILES['image']['name'];


if (!$image) {
    $image = $film['image'];
} else {
    if (!empty($file_name) && file_exists('images/' . $file_name)) {
        unlink('images/' . $file_name);
    }
    // Ambil nama file gambar
    $image = $_FILES['image']['name'];
    // Tempat menyimpan gambar
    $target = "images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}







$sql = "UPDATE films f join genre g on f.film_id = g.id_films set f.title = '$title' , f.desc = '$desc' , f.date = '$date', f.image = '$image' , g.name = '$genre' where film_id = '$id_films'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "gagal: " . mysqli_error($conn);
    exit;
}




// $values_1080 = [];
// $values_720 = [];
// $values_540 = [];

if (isset($_POST['quality1080']) && $_POST['quality1080'] === '1080' ) {
    $gd1080 = $_POST['gd1080'];
    $utb1080 = $_POST['utb1080'];
    $mg1080 = $_POST['mg1080'];

    $check_query = "SELECT * FROM link WHERE film_id = '$id_films' AND quality = '1080'";
    $check_result = mysqli_query($conn, $check_query);

    $query = mysqli_num_rows($check_result) > 0 
        ? "UPDATE link SET GD = '$gd1080', UTB = '$utb1080', MG = '$mg1080' WHERE film_id = '$id_films' AND quality = '1080'"
        : "INSERT INTO link (film_id, quality, GD, UTB, MG) VALUES ('$id_films', '1080', '$gd1080', '$utb1080', '$mg1080')";

    if (!mysqli_query($conn, $query)) {
        echo "Error " . (mysqli_num_rows($check_result) > 0 ? "updating" : "inserting") . " link data 1080: " . mysqli_error($conn);
        exit;
    }
}



if (isset($_POST['quality720']) && $_POST['quality720'] === '720' ) {
    $gd720 = $_POST['gd720'];
    $utb720 = $_POST['utb720'];
    $mg720 = $_POST['mg720'];

    $check_query = "SELECT * FROM link WHERE film_id = '$id_films' AND quality = '720'";
    $check_result = mysqli_query($conn, $check_query);

    $query = mysqli_num_rows($check_result) > 0 
        ? "UPDATE link SET GD = '$gd720', UTB = '$utb720', MG = '$mg720' WHERE film_id = '$id_films' AND quality = '720'"
        : "INSERT INTO link (film_id, quality, GD, UTB, MG) VALUES ('$id_films', '720', '$gd720', '$utb720', '$mg720')";

    if (!mysqli_query($conn, $query)) {
        echo "Error " . (mysqli_num_rows($check_result) > 0 ? "updating" : "inserting") . " link data 720: " . mysqli_error($conn);
        exit;
    }
}



if (isset($_POST['quality540']) && $_POST['quality540'] === '540' ) {
    $gd540 = $_POST['gd540'];
    $utb540 = $_POST['utb540'];
    $mg540 = $_POST['mg540'];

    $check_query = "SELECT * FROM link WHERE film_id = '$id_films' AND quality = '540'";
    $check_result = mysqli_query($conn, $check_query);

    $query = mysqli_num_rows($check_result) > 0 
        ? "UPDATE link SET GD = '$gd540', UTB = '$utb540', MG = '$mg540' WHERE film_id = '$id_films' AND quality = '540'"
        : "INSERT INTO link (film_id, quality, GD, UTB, MG) VALUES ('$id_films', '540', '$gd540', '$utb540', '$mg540')";

    if (!mysqli_query($conn, $query)) {
        echo "Error " . (mysqli_num_rows($check_result) > 0 ? "updating" : "inserting") . " link data 540: " . mysqli_error($conn);
        exit;
    }
}








echo '<script>
alert("Data Berhasil Di Edit");
window.location="' . $baseUrl . '/db/?page=post";
         </script>';
