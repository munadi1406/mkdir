<?php 
  if (isset($_COOKIE['cnm'])) {
    // Verify the cookie value with the database
    $cookie = base64_decode($_COOKIE['cnm']);
    $query = "SELECT * FROM users WHERE username = '$cookie'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        echo '<script>
        window.location="' . $baseUrl . '/login";
                     </script>';
    }
} else {
    echo '<script>
window.location="' . $baseUrl . '/login";
             </script>';
}
