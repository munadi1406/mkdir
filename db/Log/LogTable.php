<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">LOG TABLE</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
          <ul class="list-inline mb-0">
            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            <li><a data-action="close"><i class="ft-x"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="card-content collapse show p-2">
        <table class="table table-responsive display" id="table_id">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Log Id</th>
              <th scope="col">Visit Time</th>
              <th scope="col">IP Address</th>
              <th scope="col">Browser</th>
              <th scope="col">Operating System</th>
              <th scope="col">Visited Page</th>
              <th scope="col">Arrival Time</th>
              <th scope="col">Referer</th>
              <th scope="col">Screen Resolution</th>
              <th scope="col">Device</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // include './../../config/config.php';
            if (!$conn) {
              die("Error connecting to database: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM visitor_log ORDER BY visit_time DESC";
            $result = mysqli_query($conn, $sql);
            $i = 1;
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td scope="row"><?php echo $i ; ?></td>
                  <td scope="row"><?php echo $row['id']; ?></td>
                  <td><?php echo $row['visit_time']; ?></td>
                  <td><?php echo $row['ip_address']; ?></td>
                  <td><?php echo $row['browser']; ?></td>
                  <td><?php echo $row['operating_system']; ?></td>
                  <td><?php echo $row['visited_page']; ?></td>
                  <td><?php echo $row['arrival_time']; ?></td>
                  <td><?php echo $row['referrer']; ?></td>
                  <td><?php echo $row['screen_resolution']; ?></td>
                  <td><?php echo $row['device']; ?></td>
                </tr>
            <?php
            $i++;
              }
            } else {
              echo "0 results";
            }
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

