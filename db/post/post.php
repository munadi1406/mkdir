<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">POST</h4>
                <a href="?page=post-add" class="btn btn-primary mt-2">Post Add</a>
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Input</th>
                                <th scope="col">Title</th>
                                <th scope="col">desc</th>
                                <th scope="col">Date</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
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
                            // Menjalankan query untuk mengambil data dari database
                            $query = " select f.* ,g.* ,u.* from films f join genre g on f.film_id = g.id_films  join users u on f.id_users =  u.id_users  ORDER BY f.created_at DESC;";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("Query gagal: " . mysqli_error($conn));
                            }
                            // Menampilkan data dari hasil query
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['desc']; ?></td>
                                    <td><?php echo $data['date']; ?></td>
                                    <td><?php echo $data['created_at']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><img src=".../../images/<?php echo $data['image']; ?>" width="50px"></td>
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