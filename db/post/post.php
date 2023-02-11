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
                <div class="table-responsive p-2">
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
                            while ($dataFilms = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $dataFilms['username']; ?></td>
                                    <td><?php echo $dataFilms['title']; ?></td>
                                    <td><?php echo $dataFilms['desc']; ?></td>
                                    <td><?php echo $dataFilms['date']; ?></td>
                                    <td><?php echo $dataFilms['created_at']; ?></td>
                                    <td><?php echo $dataFilms['name']; ?></td>
                                    <td>
                                        <form action="?page=post-select-update" method="POST">
                                            <?php $id = $dataFilms['film_id'];
                                            $status = $dataFilms['status']; ?>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <select name="status" id="">
                                                <option value="show" <?php if ($dataFilms['status'] == 'show') echo 'selected'; ?>>Show</option>
                                                <option value="deleted" <?php if ($dataFilms['status'] == 'deleted') echo 'selected'; ?>>Deleted</option>
                                            </select>
                                            <input type="submit" value="Ubah" name="very_show" class="btn btn-info mt-1" style="padding: 5px;">
                                        </form>
                                    </td>
                                    <td><img src=".../../images/<?php echo $dataFilms['image']; ?>" width="50px"></td>
                                    <td>
                                        <?php
                                        $id_film = $dataFilms['film_id'];
                                        // loop link
                                        $query2 = "SELECT * FROM link where film_id = '$id_film'";
                                        $result2 = mysqli_query($conn, $query2);
                                        ?>
                                        <?php while ($data = mysqli_fetch_assoc($result2)) {    ?>
                                            <div><?php echo $data['quality'] ?></div>
                                            <div class="wrapper-link-post" style="display: <?php echo $data['quality']? 'flex':  '' ?>;">
                                                <a href="<?php echo $data['GD'] ?>" style="margin-right:5px ;padding:5px; display:<?php echo$data['GD']?'':'none' ?>" class="btn btn-primary " target="_blank">GD</a>
                                                <a href="<?php echo $data['UTB'] ?>" style="margin-right:5px;padding:5px; display:<?php echo$data['UTB']?'':'none' ?>" class="btn btn-success" target="_blank">UTB</a>
                                                <a href="<?php echo $data['MG'] ?>" style="padding:5px; display: <?php echo$data['MG']?'':'none' ?>" class="btn btn-danger " target="_blank">MG</a>
                                            </div>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-success w-100 mb-1">Edit</a>
                                        <a href="?page=post-delete&id=<?php echo $dataFilms['film_id'] ?>" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda Yakin Ingin Mengapus Postingan Ini Secara Permanen?');">Delete Permanent</a>
                                    </td>
                                    </td>
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