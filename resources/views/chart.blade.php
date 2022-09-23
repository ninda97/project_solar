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

    <title>{{ config('name', 'Alert') }} | @yield('title')</title>

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
                <div class="container fluid">
                    <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
                    <canvas id="myChart"></canvas>
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


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

            var colour = <?php echo json_encode($colors); ?>;
            var ctx = $('#myChart');
            var chartc = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Transaksi Status',
                        data: [],
                        backgroundColor: poolColors(colour.length),

                    }]
                }
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

                        // chartc.data.backgroundColor = poolColors(response.data.totalalert);

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
            }, 1000);
        });
    </script>

    @yield('scripts')
</body>

</html>