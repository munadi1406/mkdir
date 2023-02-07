<?php
include '../../config/config.php';

// Ambil data dari form
$title = $_POST['title'];
$date = $_POST['date'];
$desc = $_POST['desc'];

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

$sql = "INSERT INTO films (id_users, title, `desc`, date, image) VALUES (2, '$title', '$desc', '$date', '$image');";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');</script>";
    exit;
}
$id_films = mysqli_insert_id($conn);

if (isset($_POST['genre'])) {
    $selected_genres = implode(',', $_POST['genre']);
    $sql = "INSERT INTO genre (id_films, name)
  VALUES ('$id_films', '$selected_genres')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
        exit;
    }
}




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
