<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">POST</h4>
                <a href="<?php echo $baseUrl . '/db/?page=post-add' ?>" class="btn btn-primary mt-2">Post Add</a>
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
            <div class="card-content collapse show">
                <div class="table-responsive p-2" >
                    <table class="table table-striped " id="table_post">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Input</th>
                                <th scope="col">Title</th>
                                <th scope="col">desc</th>
                                <th scope="col">Date</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Memastikan koneksi ke database berhasil dibuat
                            include '../../config/config.php';

                            if (!$conn) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }
                            // users-films-genre
                            $query = " select f.* ,g.* ,u.*  from films f join genre g on f.film_id = g.id_films  join users u on f.id_users =  u.id_users ORDER BY f.created_at DESC;";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("Query gagal: " . mysqli_error($conn));
                            }
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td ><?php echo $data['desc']; ?></td>
                                    <td><?php echo $data['date']; ?></td>
                                    <td><?php echo $data['created_at']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><img src=".../../images/<?php echo $data['image']; ?>" width="50px"></td>
                                    <td>
                                        <?php
                                        $id_film = $data['film_id'];
                                        // loop link
                                        $query2 = "SELECT * FROM link where film_id = '$id_film'";
                                        $result2 = mysqli_query($conn, $query2);
                                        ?>
                                        <?php while ($data = mysqli_fetch_assoc($result2)) {    ?>
                                            <div><?php echo $data['quality'] ?></div>
                                            <div class="wrapper-link-post" style="display: flex;">
                                                <a href="<?php echo $data['GD'] ?>" style="margin-right:5px ;padding:5px;" class="btn btn-primary ">GD</a>
                                                <a href="<?php echo $data['UTB'] ?>" style="margin-right:5px;padding:5px;" class="btn btn-success">UTB</a>
                                                <a href="<?php echo $data['MG'] ?>" style="padding:5px;" class="btn btn-danger">MG</a>
                                            </div>
                                        <?php }
                                        ?>
                                    </td>
                                    <td><a href="" class="btn btn-success mr-1">Edit</a><a href="" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            // Menutup koneksi ke database
                            mysqli_close($conn);
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Striped rows end -->

<!-- Table head options start -->