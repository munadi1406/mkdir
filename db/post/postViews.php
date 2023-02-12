<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">POST Views</h4>
                <a href="<?php echo $baseUrl . '/db/?page=post' ?>" class="btn btn-primary mt-2">Post</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (!$conn) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }
                            // users-films-genre
                            $query = "select f.title , v.views from films f join viewers v on f.film_id = v.film_id order by f.created_at desc";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("Query gagal: " . mysqli_error($conn));
                            }
                            $i = 1;
                            while ($dataFilms = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $dataFilms['title']; ?></td>
                                    <td><?php echo $dataFilms['views']; ?></td>
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