<!-- Content Header (Page header) -->
<style>
    .bg-gradient-defult {
    background-image: linear-gradient(195deg, #000000 0%, #d5a764 100%);
}


.bg-gradient-success {
    background: #74574d linear-gradient(180deg, #673818, #85756f) repeat-x !important;
    color: #fff;
}

.shadow-success {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgb(74 71 70) !important;
}
</style>



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Custom Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-card my-card">
                    <div class="card-header pt-2">
                        <div class="d-icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center mt-n4 position-absolute">
                            <i class="nav-icon fa fa-file-text-o"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Sales</p>
                            <h4 class="mb-0"><?php echo Order::getTodayTotalAmount()?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0"><a style="color:#212529;" class="text-sm text-decoration-none" href="order-report">Get Sales Report</a></p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-card my-card">
                    <div class="card-header pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-defult shadow-primary text-center mt-n4 position-absolute">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Today's Orders</p>
                            <h4 class="mb-0"><?php echo Order::countTodayOrders()?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than lask month</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card d-card my-card">
                    <div class="card-header pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center mt-n4 position-absolute">
                            <i class="nav-icon fa fa-user"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">New Clients</p>
                            <h4 class="mb-0"><?php echo Customer::countLast7DaysRegistrations()?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card d-card my-card">
                    <div class="card-header pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center mt-n4 position-absolute">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Sales</p>
                            <h4 class="mb-0"><?php echo Order::getTotalOrderAmount()?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3">
                        <p class="mb-0"><a style="color:#212529;" class="text-sm text-decoration-none" href="order-report">Get Sales Report</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small boxes (End box) -->

        <!-- chart row Start -->
        <div class="row mt-4">

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card d-card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-defult shadow-primary border-radius-lg pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Daily Sales</h6>
                        <p class="text-sm">Last 7 Days Performance</p>
                        <hr class="dark horizontal" />
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">Data for the last 7 days</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card d-card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-success border-radius-lg pe-1">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Monthly Sales</h6>
                        <p class="text-sm">(<span class="font-weight-bolder">+15%</span>) increase in this month's sales.</p>
                        <hr class="dark horizontal" />
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">updated 1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mb-3">
                <div class="card d-card z-index-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0">Monthly Orders</h6>
                        <p class="text-sm">Last Campaign Performance</p>
                        <hr class="dark horizontal" />
                        <div class="d-flex">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- chart row End -->
    </div> 
    <!-- /.container-fluid -->
</section>

<!-- Chart Create js -->
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");
    var salesDataLast7Days = <?php echo json_encode(Order::getSalesDataLast7Days()); ?>;

    new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["6 days ago", "5 days ago", "4 days ago", "3 days ago", "2 days ago", "Yesterday", "Today"],
        datasets: [
            {
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: salesDataLast7Days,
                maxBarThickness: 6,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            },
        },
        interaction: {
            intersect: false,
            mode: "index",
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: "rgba(255, 255, 255, .2)",
                },
                ticks: {
                    suggestedMin: 0,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: "normal",
                        lineHeight: 2,
                    },
                    color: "#fff",
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: "rgba(255, 255, 255, .2)",
                },
                ticks: {
                    display: true,
                    color: "#f8f9fa",
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: "normal",
                        lineHeight: 2,
                    },
                },
            },
        },
    },
});

    var ctx2 = document.getElementById("chart-line").getContext("2d");
    var monthlySalesData = <?php echo json_encode(Order::getMonthlySalesData()); ?>;

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Sales",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: monthlySalesData,
                    maxBarThickness: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: "rgba(255, 255, 255, .2)",
                    },
                    ticks: {
                        display: true,
                        color: "#f8f9fa",
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        color: "#f8f9fa",
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
            },
        },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
    var monthlyOrdersData = <?php echo json_encode(Order::getMonthlyOrderData()); ?>;

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Orders",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: monthlyOrdersData,
                    maxBarThickness: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: "rgba(255, 255, 255, .2)",
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: "#f8f9fa",
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        color: "#f8f9fa",
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
            },
        },
    });
</script>
