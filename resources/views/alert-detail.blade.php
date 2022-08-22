@extends('layouts.app')

@section('title', 'Alert Detail')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alert Telegram</h1>
        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <section class="section">
        <div class="card table-responsive">
            <div class="card-header">
                Data Alert Telegram
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>AlertGroupID</th>
                            <th>Alert ID</th>
                            <th>Node Name</th>
                            <th>Node IP Address</th>
                            <th>Location</th>
                            <th>CPU Load</th>
                            <th>Percent Memory Used</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_alertgroup as $result)
                        <tr>
                            <td>{{ $result->alertgroupid }}</td>
                            <td>{{ $result->alertid }}</td>
                            <td>{{ $result->nodename }}</td>
                            <td>{{ $result->nodeipaddress }}</td>
                            <td>{{ $result->location }}</td>
                            <td>{{ $result->cpuload }}</td>
                            <td>{{ $result->memoryused }}</td>
                            <td>
                                @if($result->status=='Down') <span class="badge bg-danger"> {{ $result->status }}</span> @endif
                                @if($result->status=='Warning') <span class="badge bg-warning"> {{ $result->status }}</span> @endif
                            </td>
                            <td>{{ $result->created_at }}</td>
                            <td>{{ $result->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alert Telegram<
    </div> -->

</div>

<script src="{{asset ('style/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection