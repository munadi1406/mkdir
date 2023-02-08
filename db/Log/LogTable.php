<table border="1">
  <tr>
    <th>ID</th>
    <th>Visit Time</th>
    <th>IP Address</th>
    <th>Browser</th>
    <th>Operating System</th>
    <th>Visited Page</th>
  </tr>
  <?php
    include './../../config/config.php';
    if (!$conn) {
      die("Error connecting to database: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM visitor_log";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["visit_time"] . "</td>";
        echo "<td>" . $row["ip_address"] . "</td>";
        echo "<td>" . $row["browser"] . "</td>";
        echo "<td>" . $row["operating_system"] . "</td>";
        echo "<td>" . $row["visited_page"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
  ?>
</table>
