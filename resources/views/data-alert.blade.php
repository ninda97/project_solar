<!DOCTYPE html>
<html lang="en">

{{-- Include Head --}}
@include('common.head')
@section('title', 'Alert&PIC')

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
                        <h1 class="h3 mb-0 text-gray-800">Data Alert Telegram</h1>
                        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
                    </div>

                    {{-- Alert Messages --}}
                    @include('common.alert')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Alert Telegram</h6>
                        </div>
                        @hasrole('Admin')
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped" id="alertPicTable">
                                        <thead>
                                            <tr>
                                                <th>Alert ID</th>
                                                <th>Node Name</th>
                                                <th>IP Address</th>
                                                <th>Message</th>
                                                <th>PIC</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        @else
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped" id="alertPicTable">
                                        <thead>
                                            <tr>
                                                <th>Alert ID</th>
                                                <th>Node Name</th>
                                                <th>IP Address</th>
                                                <th>Message</th>
                                                <th>PIC</th>
                                                <th>Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        @endhasrole
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


    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


    <script>
        $(document).ready(function() {

            var _token = $('input[name="_token"]').val();


            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            load_data();

            function load_data(from_date = '', to_date = '') {
                $('#alertPicTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('alert.index') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            _token: _token
                        }
                    },
                    columns: [{
                            data: 'alertid',
                            name: 'alertid'
                        },
                        {
                            data: 'nodename',
                            name: 'nodename'
                        },
                        {
                            data: 'nodeipaddress',
                            name: 'nodeipaddress'
                        },
                        {
                            data: 'alertmessage',
                            name: 'alertmessage'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        }
                    ]
                });
            }
            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>
    @yield('scripts')
</body>

</html>