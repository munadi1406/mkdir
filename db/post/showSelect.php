<?php 

include '../../config/config.php';

$id = $conn->escape_string($_POST["id"]);
$status = $conn->escape_string($_POST["status"]);

// Buat query UPDATE
$query = "UPDATE films SET status = '$status' WHERE film_id = $id";

// Jalankan query
$result = $conn->query($query);

if ($result) {
echo '<script>
    alert("Staus Berhasil Di Ubah Ke '. $status .'");
    window.location="' . $baseUrl . '/db/?page=post";
 </script>';
    exit;
//   echo 'berhaisl';
} else {
    // Jika gagal, tampilkan pesan kesalahan
      echo "Terjadi kesalahan saat mengubah status pengguna: " . $conn->error;
}

?>