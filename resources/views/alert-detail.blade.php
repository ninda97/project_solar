<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Alert') }} | Detail Alert </title>

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
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" /> -->


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
                        <h1 class="h3 mb-0 text-gray-800">Alerts List</h1>
                        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                    </div>

                    {{-- Alert Messages --}}
                    @include('common.alert')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Alert</h6>
                        </div>
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <div class="row input-daterange">
                                        <div class="col-md-2">
                                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Start Date" readonly />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="End Date" readonly />
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                                            <button type="button" name="refresh" id="refresh" class="btn btn-warning">Refresh</button>
                                        </div>
                                    </div>
                                    <div class="print-buttons text-right">Export Table<br /></div>
                                    <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="table table-striped table-bordered" id="alertTable">
                                            <thead>
                                                <tr>
                                                    <th class="col-auto">NO</th>
                                                    <th class="col-auto">Alert ID</th>
                                                    <th class="col-auto">Node Name</th>
                                                    <th class="col-auto">Node IP Address</th>
                                                    <th class="col-auto">Location</th>
                                                    <th class="col-auto">CPU Load</th>
                                                    <th class="col-auto">Percent Memory Used</th>
                                                    <th class="col-auto">Status</th>
                                                    <th class="col-auto">Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="col-auto">NO</th>
                                                    <th class="col-auto">Alert ID</th>
                                                    <th class="col-auto">Node Name</th>
                                                    <th class="col-auto">Node IP Address</th>
                                                    <th class="col-auto">Location</th>
                                                    <th class="col-auto">CPU Load</th>
                                                    <th class="col-auto">Percent Memory Used</th>
                                                    <th class="col-auto">Status</th>
                                                    <th class="col-auto">Created</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {

            var _token = $('input[name="_token"]').val();


            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            load_data();

            // $('#alertTable thead tr')
            //     .clone(true)
            //     .addClass('filters')
            //     .appendTo('#alertTable thead');

            $('#alertTable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });


            function load_data(from_date = '', to_date = '') {

                var table = $('#alertTable').DataTable({
                    fixedColumns: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('alertgroup.index') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            _token: _token
                        }
                    },
                    columns: [{
                            data: 'alertgroupid',
                            name: 'alertgroupid'
                        },
                        {
                            data: "alertid",
                            name: "alertid",

                        },
                        {
                            data: 'nodename',
                            name: 'nodename',

                        },
                        {
                            data: 'nodeipaddress',
                            name: 'nodeipaddress'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'cpuload',
                            name: 'cpuload'
                        },
                        {
                            data: 'memoryused',
                            name: 'memoryused'
                        },
                        {
                            data: 'Status',
                            name: 'Status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    dom: 'Blfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf',
                    ],
                    initComplete: function() {
                        // Apply the search
                        this.api()
                            .columns()
                            .every(function() {
                                var that = this;

                                $('input', this.footer()).on('keyup change clear', function() {
                                    if (that.search() !== this.value) {
                                        that.search(this.value).draw();
                                    }
                                });
                            });
                    },
                });

                table.buttons().container()
                    .appendTo($('.print-buttons'));

            }

            $('#filter').click(function() {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $('#alertTable').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function() {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#alertTable').DataTable().destroy();
                load_data();
            });

            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>

    @yield('scripts')
</body>

</html>