@extends('layouts.app')

@section('title', 'Ticket Detail')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ticket Detail</h1>
        <a href="{{route('trx_ticket.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ticket Detail</h6>
        </div>

        <div class="card-body">
            <div class="form-group row">

                {{-- Alert ID --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Alert ID</label>
                    <input type="text" class="form-control" id="ticketid" name="ticketid" value="{{ $ticket->alertid }}" disabled>
                </div>

                {{-- name --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $ticket->name }}" disabled>
                </div>

                {{-- chatid --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node Name</label>
                    <input type="text" class="form-control" id="chatid" name="chatid" value="{{ $ticket->chatid }}" disabled>
                </div>

                {{-- title --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node IP Address</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}" disabled>
                </div>

                {{-- tickettype --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>CPU Load</label>
                    <input type="text" class="form-control" id="tickettype" name="tickettype" value="{{ $ticket->tickettype }}" disabled>
                </div>

                {{-- created_at --}}
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Created At</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{$ticket->created_at}}" disabled>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('trx_ticket.index') }}">Done</a>
        </div>
    </div>

</div>


@endsection