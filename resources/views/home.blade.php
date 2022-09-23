<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Alert') }} | Dashboard</title>

    {{-- ICON --}}
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/btn.jpg') }}" />

    <!-- Font Awesome UI KIT-->
    <script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center mb-3">Alert Notification Dashboard</h2>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @foreach($result as $result)
                        <!-- Total Alert -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-500 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Alert</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result->totalalert}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-telegram fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Alert Warning -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Alert Warning</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result->totalwarning}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Alert Critical -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Alert Critical</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result->totalcritical}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Alert Down -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Alert Down</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result->totaldown}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-power-off fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Ticket -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ticket</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$result->totalticket}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-ticket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @hasrole('User')
                        @foreach($resultu as $mine)
                        <!-- Total Ticket User -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-2">
                                                My Tickets</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mine->totalticket}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-ticket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endhasrole
                    </div>

                    <div class="row">
                        <!-- <div class="chart-container row" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myChart"></canvas>
                        </div> -->
                        <div class="card col-xl-12 col-md-6 mb-12">
                            <div class="card-header">
                                <i class="fa fa-area-chart"></i> Alert by Month
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart" height="50"></canvas>
                            </div>
                            <!-- <div class="card-footer small text-muted">Updated yesterday at @php echo date('F j, Y', time() ) @endphp</div> -->
                        </div>
                    </div>
                    </br>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Alert</button>
                            @hasrole('User')
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">My Alert</button>
                            @endhasrole
                        </div>
                    </nav>
                    <div class="row">
                        <div class="card">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-chart-pie"></i> Dynamic Alert Ratio by Status
                                        </div>
                                        <div class="card-body" style="background-color: #B8D8A0;">
                                            <canvas id="pieChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                                @hasrole('User')
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-chart-pie"></i> My Own Alert Ratio by Status
                                        </div>
                                        <div class="card-body" style="background-color: #B8D8A0;">
                                            <canvas id="pieChartu" width="600" height="600" style="display: block; box-sizing: border-box; height: 400px; width: 400px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                @endhasrole
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-chart-pie"></i> Alert Ratio by PIC
                            </div>
                            <div class="card-body" style="background-color: #EBCCC5;">
                                <canvas id="doughnutChart" width="400" height="400"></canvas>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-chart-pie"></i> Alert Ratio by Group Application
                            </div>
                            <div class="card-body" style="background-color:#A0D5D8;">
                                <canvas id="polarChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <!-- <div class="chart-container row" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myChart"></canvas>
                        </div> -->
                        <div class="card col-xl-12 col-md-6 mb-12">
                            <div class="card-header">
                                <i class="fa fa-chart-bar"></i> Alert Ratio by Location
                            </div>
                            <div class="card-body">
                                <canvas id="barChart" height="70"></canvas>
                            </div>
                            <!-- <div class="card-footer small text-muted">Updated yesterday at @php echo date('F j, Y', time() ) @endphp</div> -->
                        </div>
                    </div>

                    <br>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('common.logout-modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/app.js')}}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->



    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        var labels = <?php echo json_encode($label_month); ?>;
        var dats = <?php echo json_encode($month); ?>;
        // const labels = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        //     'May',
        //     'June',
        // ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Alert',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dats,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('lineChart'),
            config
        );
    </script>

    <script>
        $(document).ready(function() {
            function getRandomColor() {
                var letters = '0123456789ABCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            function poolColors(a) {
                var pool = [];
                for (i = 0; i < a; i++) {
                    pool.push(getRandomColor());
                }
                return pool;
            }

            // const plugin = {
            //     id: 'custom_canvas_background_color',
            //     beforeDraw: (chart) => {
            //         const {
            //             ctx
            //         } = chart;
            //         ctx.save();
            //         ctx.globalCompositeOperation = 'destination-over';
            //         ctx.fillStyle = 'lightGreen';
            //         ctx.fillRect(0, 0, chart.width, chart.height);
            //         ctx.restore();
            //     }
            // };

            var colour = <?php echo json_encode($colors); ?>;
            var ctx = $('#pieChart');
            var chartc = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Transaksi Status',
                        data: [],
                        backgroundColor: poolColors(colour.length),

                    }],
                    hoverOffset: 4
                },
                // plugins: [plugin],
            });

            var updateChart = function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('index') }}",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        chartc.data.labels = response.data.map(function(e) {
                            return e.desc
                        })

                        chartc.data.datasets[0].data = response.data.map(function(e) {
                            return e.totalalert
                        })

                        chartc.update();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseJSON);
                    }
                });
            }

            updateChart();
            setInterval(() => {
                updateChart();
            }, 2000);
        });
    </script>

    <script>
        var lab = <?php echo json_encode($label); ?>;
        var datau = <?php echo json_encode($datau); ?>;

        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function poolColors(a) {
            var pool = [];
            for (i = 0; i < a; i++) {
                pool.push(getRandomColor());
            }
            return pool;
        }


        const datap = {
            labels: lab,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: poolColors(datau.length),
                borderColor: 'white',
                data: datau,
            }]
        };

        const configp = {
            type: 'pie',
            data: datap,
            options: {}
        };
        const pieChartus = new Chart(
            document.getElementById('pieChartu'),
            configp
        );
    </script>

    <script>
        var lab = <?php echo json_encode($labelg); ?>;
        var datag = <?php echo json_encode($datag); ?>;

        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function poolColors(a) {
            var pool = [];
            for (i = 0; i < a; i++) {
                pool.push(getRandomColor());
            }
            return pool;
        }


        const datagroup = {
            labels: lab,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: poolColors(datag.length),
                borderColor: 'white',
                data: datag,
            }]
        };

        const configgroup = {
            type: 'polarArea',
            data: datagroup,
            options: {}
        };
        const polarChart = new Chart(
            document.getElementById('polarChart'),
            configgroup
        );
    </script>


    <script>
        var piclabel = <?php echo json_encode($pic); ?>;
        var datapic = <?php echo json_encode($datapic); ?>;

        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function poolColors(a) {
            var pool = [];
            for (i = 0; i < a; i++) {
                pool.push(getRandomColor());
            }
            return pool;
        }

        const datadoughnut = {
            labels: piclabel,
            datasets: [{
                label: 'My First Dataset',
                data: datapic,
                backgroundColor: poolColors(datapic.length),
                hoverOffset: 4
            }]
        };
        const configdoughnut = {
            type: 'doughnut',
            data: datadoughnut,
            options: {}
        };
        const doughnutChart = new Chart(
            document.getElementById('doughnutChart'),
            configdoughnut
        );
    </script>


    <script>
        var barlabel = <?php echo json_encode($barlabel); ?>;
        var bardata = <?php echo json_encode($bardata); ?>;
        const databar = {
            labels: barlabel,
            datasets: [{
                label: "Waning",
                backgroundColor: 'rgba(255, 178, 102, 0.7)',
                data: [bardata[0][0], bardata[1][0], bardata[2][0]],
            }, {
                label: "Critical",
                backgroundColor: 'rgba(255, 0, 0, 0.6)',
                data: [bardata[0][1], bardata[1][1], bardata[2][1]]
            }, {
                label: "Down",
                backgroundColor: 'rgba(102,0,0, 0.7)',
                data: [bardata[0][2], bardata[1][2], bardata[2][2]]
            }]
        };

        const configbar = {
            type: 'bar',
            data: databar,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const barChart = new Chart(
            document.getElementById('barChart'),
            configbar
        );
    </script>


    @yield('scripts')
</body>

</html>