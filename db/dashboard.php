<?php
// Koneksi ke database
include '../config/config.php';

// Perintah SQL untuk menghitung jumlah baris
$sql = "SELECT COUNT(*) as total FROM films";

// Eksekusi perintah dan simpan hasilnya dalam variabel
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// Tampilkan jumlah baris


// Tutup koneksi
mysqli_close($conn);
?>


<div class="content-wrapper-before"></div>
<div class="content-header row">
</div>
<div class="content-body"><!-- Chart -->
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card pull-up ecom-card-1 bg-white border">
                <div class="card-content ecom-card2 height-180">
                    <h5 class="text-muted danger position-absolute p-1">Post</h5>
                    <i class="ft-pie-chart danger font-large-1 " style="position: absolute; top: 5px; right: 5px;"></i>
                    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                        <h1 style="margin: 0;"><?php echo $data['total'] ?></h1>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-180">
                    <h5 class="text-muted info position-absolute p-1">Activity Stats</h5>
                    <div>
                        <i class="ft-activity info font-large-1 float-right p-1"></i>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-180">
                    <h5 class="text-muted warning position-absolute p-1">Sales Stats</h5>
                    <div>
                        <i class="ft-shopping-cart warning font-large-1 float-right p-1"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ eCommerce statistic -->
</div>