<?php
include '../../config/config.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$date = mysqli_real_escape_string($conn, $_POST['date']);


// Validasi form tidak boleh kosong
if ($title == "" || $desc == "") {
    echo "<script>alert('Form tidak boleh kosong');</script>";
    exit;
}

// Ambil nama file gambar
$image = $_FILES['image']['name'];
// Tempat menyimpan gambar
$target = "images/" . basename($image);

$id_users = $_SESSION['id_users'];

// Validasi file gambar
if ($_FILES['image']['size'] == 0) {
    echo "<script>alert('File gambar harus dipilih');</script>";
    exit;
}


// $image = mysqli_real_escape_string($conn, $_POST['image']);

$sql = "INSERT INTO films (id_users, title, `desc`, date, image) VALUES (2, '$title', '$desc', '$date', '$image');";
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

$gd1080 = mysqli_real_escape_string($conn, $_POST['gd1080']);
$utb1080 = mysqli_real_escape_string($conn, $_POST['utb1080']);
$mg1080 = mysqli_real_escape_string($conn, $_POST['mg1080']);
$quality1080 = mysqli_real_escape_string($conn, $_POST['quality1080']);

$gd720= mysqli_real_escape_string($conn, $_POST['gd720']);
$utb720= mysqli_real_escape_string($conn, $_POST['utb720']);
$mg720= mysqli_real_escape_string($conn, $_POST['mg720']);
$quality720= mysqli_real_escape_string($conn, $_POST['quality720']);

$gd540 = mysqli_real_escape_string($conn, $_POST['gd540']);
$utb540 = mysqli_real_escape_string($conn, $_POST['utb540']);
$mg540 = mysqli_real_escape_string($conn, $_POST['mg540']);
$quality540 = mysqli_real_escape_string($conn, $_POST['quality540']);



$sql = "INSERT INTO link (GD, UTB, MG, film_id, quality) VALUES ('$gd1080', '$utb1080', '$mg1080', '$id_films', '$quality1080'),('$gd720', '$utb720', '$mg720', '$id_films', '$quality720'),('$gd540', '$utb540', '$mg540', '$id_films', '$quality540')";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error inserting link data: " . mysqli_error($conn);
}

mysqli_close($conn);






if (!file_exists('images')) {
    mkdir('images', 0777, true);
}

// Upload gambar
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
} else {
    echo "<script>alert('Gambar gagal diupload');</script>";
}

echo '<script>
                window.location="/movie/db/?page=post";
             </script>';
