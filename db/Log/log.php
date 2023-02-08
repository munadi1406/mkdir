<?php
// Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
include './../../config/config.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT visited_page, COUNT(visited_page) as count FROM visitor_log GROUP BY visited_page";
$result = mysqli_query($conn, $sql);

$data = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'visited_page' => $row["visited_page"],
            'count' => (int)$row["count"]
        );
    }
} else {
    echo "0 results";
}

$result = $conn->query("SELECT DATE(visit_time) as date, COUNT(*) as visits FROM visitor_log WHERE visit_time IS NOT NULL GROUP BY date");

// Format data for Chart.js
$visit_time = [];
$visits = [];
while ($row = $result->fetch_assoc()) {
    array_push($visit_time, $row['date']);
    array_push($visits, $row['visits']);
}
$visit_time = json_encode($visit_time);
$visits = json_encode($visits);

mysqli_close($conn);


?>

<head>
    <title>Visitor Log Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>

<body>
    <a href="?page=log-table" class="btn btn-primary m-2">Log Table</a>
    <section id="chartjs-line-charts">
        <!-- Line Chart -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengunjung</h4>
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
                        <div class="card-body chartjs">
                            <div class="height-500">
                                <canvas id="visitorChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Url Yang Di Kunjungi</h4>
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
                    <div class="card-body">
                        <div class="height-400">
                            <canvas id="simple-doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>



    <script>
        // halaman yang di kunjungi
        var ctx = document.getElementById('simple-doughnut-chart').getContext('2d');
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
        };
        // Chart Data
        var chartData = {
            labels: [<?php foreach ($data as $d) {
                            echo '"' . $d['visited_page'] . '",';
                        } ?>],
            datasets: [{
                label: "My First dataset",
                data: [<?php foreach ($data as $d) {
                            echo $d['count'] . ',';
                        } ?>],
                backgroundColor: ['#666EE8', '#28D094', '#FF4961', '#1E9FF2', '#FF9149'],
            }]
        };
        var config = {
            type: 'doughnut',

            // Chart Options
            options: chartOptions,

            data: chartData
        };
        // Create the chart
        var doughnutSimpleChart = new Chart(ctx, config);


        var pengunjung = document.getElementById('visitorChart').getContext('2d');
        var myChart = new Chart(pengunjung, {
            type: 'line',
            data: {
                labels: <?php echo $visit_time; ?>,
                datasets: [{
                    label: 'Visits',
                    data: <?php echo $visits; ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            },
            title: {
                display: true,
                text: 'Chart.js Line Chart - Legend'
            }
        };
        // Chart Data
        var chartData = {
            labels: <?php echo $visit_time; ?>,
            datasets: [{
                label: <?php echo $visit_time; ?>,
                data: <?php echo $visits; ?>,
                fill: false,
                borderDash: [5, 5],
                borderColor: "#9C27B0",
                pointBorderColor: "#9C27B0",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            }]
        };
        var config2 = {
            type: 'line',

            // Chart Options
            options: chartOptions,

            data: chartData
        };

        // Create the chart
        var lineChart = new Chart(pengunjung, config2);
    </script>
</body>