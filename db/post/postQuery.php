<?php
include '../../config/config.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$date = mysqli_real_escape_string($conn, $_POST['date']);


// Validasi form tidak boleh kosong
if ($title == "" || $desc == "") {
    echo '<script>
    alert("Form Harus Di Isi");
    window.location="' . $baseUrl . '/db/?page=post-add";
 </script>';
    exit;
}


// Ambil nama file gambar
$image = $_FILES['image']['name'];
// Tempat menyimpan gambar
$target = "images/" . basename($image);

$id_users = base64_decode($_COOKIE['cid']);

// Validasi file gambar
if ($_FILES['image']['size'] == 0) {
    echo '<script>
    alert("Gambar Harus Di Pilih");
    window.location="' . $baseUrl . '/db/?page=post-add";
 </script>';
    exit;
}


// $image = mysqli_real_escape_string($conn, $_POST['image']);

$sql = "INSERT INTO films (id_users, title, `desc`, date, image) VALUES ($id_users, '$title', '$desc', '$date', '$image');";
if (mysqli_query($conn, $sql)) {
    $id_films = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    exit;
}

if (isset($_POST['genre'])) {
    $selected_genres = implode(',', $_POST['genre']);
    $sql = "INSERT INTO genre (id_films, name) VALUES ('$id_films', '$selected_genres')";

    if (mysqli_query($conn, $sql)) {
        // echo "New genre record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit;
    }
}

$values = [];
if (isset($_POST['quality1080']) && $_POST['quality1080'] === '1080') {
    $gd1080 = $_POST['gd1080'];
    $utb1080 = $_POST['utb1080'];
    $mg1080 = $_POST['mg1080'];
    $values[] = "('$gd1080', '$utb1080', '$mg1080', '$id_films', '1080')";
}
if (isset($_POST['quality720']) && $_POST['quality720'] === '720') {
    $gd720 = $_POST['gd720'];
    $utb720 = $_POST['utb720'];
    $mg720 = $_POST['mg720'];
    $values[] = "('$gd720', '$utb720', '$mg720', '$id_films', '720')";
}
if (isset($_POST['quality540']) && $_POST['quality540'] === '540') {
    $gd540 = $_POST['gd540'];
    $utb540 = $_POST['utb540'];
    $mg540 = $_POST['mg540'];
    $values[] = "('$gd540', '$utb540', '$mg540', '$id_films', '540')";
}

if (count($values) > 0) {
    $values = implode(",", $values);
    $sql = "INSERT INTO link (GD, UTB, MG, film_id, quality) VALUES $values";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error inserting link data: " . mysqli_error($conn);
    }
}

$sql = "INSERT INTO viewers (film_id,views) VALUES ('$id_films',0)";
$res = mysqli_query($conn,$sql);
if(!$res){
    exit;
}

mysqli_close($conn);



if (!file_exists('images')) {
    mkdir('images', 0777, true);
}

// Upload gambar
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    
} else {
    echo '<script>
    alert("Gambar Harus Di Upload");
    window.location="' . $baseUrl . '/db/?page=post-add";
 </script>';
}

echo '<script>
alert("Data Berhasil Di Post");
window.location="' . $baseUrl . '/db/?page=post";
             </script>';
