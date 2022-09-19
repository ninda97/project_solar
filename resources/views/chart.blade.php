<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('common.head')
@section('title', 'Dashboard')

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
                    <div class="row">
                        <!-- <div class="chart-container row" style="position: relative; height:40vh; width:80vw">
                            <canvas id="myChart"></canvas>
                        </div> -->
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-chart-bar"></i> Alert Ratio
                            </div>
                            <div class="card-body">
                                <canvas id="barChart" width="400" height="400"></canvas>
                            </div>
                            <!-- <div class="card-footer small text-muted">Updated yesterday at @php echo date('F j, Y', time() ) @endphp</div> -->
                        </div>
                    </div>
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
        const myChart = new Chart(
            document.getElementById('barChart'),
            configbar
        );
    </script>

    @yield('scripts')
</body>

</html>