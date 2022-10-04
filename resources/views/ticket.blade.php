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

    <title>{{ config('name', 'Alert') }} | Incident Ticket </title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tickets List</h1>
                        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                    </div>

                    {{-- Alert Messages --}}
                    @include('common.alert')
                    <section class="section">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Incident Tickets</h6>
                            </div>
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

                                <div style="overflow-x:auto;">
                                    <table class="table table-bordered table-striped" id="ticketTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="col-auto">Ticket ID</th>
                                                <th class="col-auto">Alert ID</th>
                                                <th class="col-auto">Assign To</th>
                                                <th class="col-auto">Title</th>
                                                <th class="col-auto">Ticket Type</th>
                                                <th class="col-auto">Created Time</th>
                                                <th class="col-auto">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="col-auto">Ticket ID</th>
                                                <th class="col-auto">Alert ID</th>
                                                <th class="col-auto">Assign To</th>
                                                <th class="col-auto">Title</th>
                                                <th class="col-auto">Ticket Type</th>
                                                <th class="col-auto">Created Time</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
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

            // $('#ticketTable thead tr')
            //     .clone(true)
            //     .addClass('filters')
            //     .appendTo('#ticketTable thead');

            $('#ticketTable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });


            function load_data(from_date = '', to_date = '') {

                var table = $('#ticketTable').DataTable({
                    fixedColumns: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('trx_ticket.index') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            _token: _token
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'alertid',
                            name: 'alertid'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'tickettype',
                            name: 'tickettype'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'Detail',
                            name: 'Detail'
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
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
                    $('#ticketTable').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function() {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#ticketTable').DataTable().destroy();
                load_data();
            });

            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>

    @yield('scripts')
</body>

</html>