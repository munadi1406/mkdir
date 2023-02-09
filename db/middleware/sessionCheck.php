<?php 
  if (isset($_COOKIE['cid'])) {
    // Verify the cookie value with the database
    $cookie = base64_decode($_COOKIE['cid']);
    $query = "SELECT * FROM users WHERE username = '$cookie'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        header('location: ' . $baseUrl . '/login');
        exit;
    }
} else {
    header('location: ' . $baseUrl . '/login');
    exit;
}
?>
