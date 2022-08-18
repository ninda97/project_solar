@extends('layouts.app')

@section('title', 'Alert')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alert Telegram</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alert Telegram</h6>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Data Alert Telegram
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Alert ID</th>
                                <th>Node Name</th>
                                <th>IP Address</th>
                                <th>Message</th>
                                <th>Chat ID</th>
                                <th>PIC</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_alert as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->alertid }}</td>
                                <td>{{ $result->nodename }}</td>
                                <td>{{ $result->nodeipaddress }}</td>
                                <td>{{ $result->alertmessage }}</td>
                                <td>{{ $result->chatid }}</td>
                                <td>{{ $result->pic }}</td>
                                <td>{{ $result->created }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

    </div>

</div>

<script src="{{asset ('style/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection