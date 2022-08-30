@extends('layouts.app')

@section('title', 'Alert Detail')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alerts List</h1>
        <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    @hasrole('Admin')
    <!-- DataTales Example -->
    <section class="section">
        <div class="card-header">
            All Alerts
        </div>
        <div class="card-body">
            <div class="card table-responsive">
                <table class="table table-striped" id="table1">
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
                            <th class="col-auto">Detail</th>
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
                            <td>{{ $result->cpuload }}%</td>
                            <td>{{ $result->memoryused }}%</td>
                            <td>
                                @if($result->status==2) <span class="badge bg-danger" style="color:white"> {{ $result->description }}</span> @endif
                                @if($result->status==13) <span class="badge bg-critical" style="color:white"> {{ $result->description }}</span> @endif
                                @if($result->status==3) <span class="badge bg-warning" style="color:white"> {{ $result->description }}</span> @endif
                            </td>
                            <td>{{ $result->created_at }}</td>
                            <td><a href="{{ route('alertgroup.show', [$result->alertgroupid]) }}" class="btn btn-primary m-2">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $list_alertgroup->links() }}
            </div>
        </div>
    </section>
    @else
    <section class="section">
        <div class="card table-responsive">
            <div class="card-header">
                My Alerts
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
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
                        @foreach($list_alertgroup as $result)
                        <tr>
                            @if($result->chatid == auth()->user()->chatid)
                            <td>{{ $result->alertid }}</td>
                            <td>{{ $result->nodename }}</td>
                            <td>{{ $result->nodeipaddress }}</td>
                            <td>{{ $result->location }}</td>
                            <td>{{ $result->cpuload }}%</td>
                            <td>{{ $result->memoryused }}%</td>
                            <td>
                                @if($result->status==2) <span class="badge bg-danger" style="color:white"> {{ $result->description }}</span> @endif
                                @if($result->status==3) <span class="badge bg-warning" style="color:white"> {{ $result->description }}</span> @endif
                                @if($result->status!=2 && $result->status!=3) <span> {{ $result->description }}</span> @endif
                            </td>
                            <td>{{ $result->created_at }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $list_alertgroup->links() }}
            </div>
        </div>
    </section>
    @endhasrole

</div>

@endsection