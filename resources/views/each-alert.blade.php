@extends('layouts.app')

@section('title', 'Alert Detail')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alert Detail</h1>
        <a href="{{route('alertgroup.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alert Detail</h6>
        </div>

        <div class="card-body">
            <div class="form-group row">

                {{-- Alert ID --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Alert ID</label>
                    <input type="text" class="form-control" id="alertid" name="alertid" value="{{ $alert->alertid }}" disabled>
                </div>

                {{-- nodename --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node Name</label>
                    <input type="text" class="form-control" id="nodename" name="nodename" value="{{ $alert->nodename }}" disabled>
                </div>

                {{-- nodeipaddress --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node IP Address</label>
                    <input type="text" class="form-control" id="nodeipaddress" name="password" value="{{ $alert->nodeipaddress }}" disabled>
                </div>

                {{-- cpuload --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>CPU Load</label>
                    <input type="text" class="form-control" id="cpuload" name="cpuload" value="{{ $alert->cpuload }}" disabled>
                </div>

                {{-- location --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{$alert->location}}" disabled>
                </div>

                {{-- memoryused --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Memory Used</label>
                    <input type="text" class="form-control" id="memoryused" name="memoryused" value="{{$alert->memoryused}}" disabled>
                </div>

                {{-- status --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{$alert->status}}" disabled>
                </div>

                {{-- created_at --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Created At</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{$alert->created_at}}" disabled>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('alertgroup.index') }}">Done</a>
        </div>
    </div>

</div>


@endsection