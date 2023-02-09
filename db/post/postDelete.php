<?php

include '../../config/config.php';
// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan id film dari URL
$film_id = $_GET['id'];

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

