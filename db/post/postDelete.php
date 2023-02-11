<?php

include '../../config/config.php';
// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan id film dari URL
$film_id = $_GET['id'];

$query = "SELECT * FROM films WHERE film_id = $film_id";
$result = mysqli_query($conn, $query);
$film = mysqli_fetch_assoc($result);
$file_name = $film['image'];

// Hapus file dari folder images
if (!empty($file_name) && file_exists('images/' . $file_name)) {
    unlink('images/' . $file_name);
}

// Query hapus data film
$query = "DELETE FROM films WHERE film_id = $film_id";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    echo '<script>
                alert("Postingan Berhasil Di Hapus Permanen");
                window.location="'. $baseUrl .'/db/?page=post";
             </script>';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);

?>

