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

                <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                    <label>Ticket ID</label>
                    <input type="text" class="form-control" id="ticketid" name="ticketid" value="{{ $ticket->id }}" disabled>
                </div>

                <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                    <label>PIC</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $ticket->name }}" disabled>
                </div>

                <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                    <label>Created At</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{$ticket->created_at}}" disabled>
                </div>

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node Name</label>
                    <input type="text" class="form-control" id="chatid" name="chatid" value="{{ $ticket->nodename }}" disabled>
                </div>

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Node IP Address</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->nodeipaddress }}" disabled>
                </div>

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>CPU Load</label>
                    <input type="text" class="form-control" id="tickettype" name="tickettype" value="{{ $ticket->cpuload }}%" disabled>
                </div>

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Memory Used</label>
                    <input type="text" class="form-control" id="tickettype" name="tickettype" value="{{ $ticket->memoryused }}%" disabled>
                </div>

                <hr style="width:100%;text-align:left;margin-left:0">

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Source</label>
                    <input type="text" class="form-control" value="{{ $ticket->source }}" disabled>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Perihal</label>
                    <input type="text" class="form-control" value="{{ $ticket->title }}" disabled>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Description</label>
                    <textarea class="form-control" disabled>{{$ticket->description}}</textarea>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Kode Outlet</label>
                    <select class="form-control" disabled>
                        <option value="{{$ticket->outletcode}}">{{$ticket->outletcode}}
                    </select>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Outlet Reported</label>
                    <select class="form-control" disabled>
                        <option value="{{$ticket->outletreported}}">{{$ticket->outletreported}}
                    </select>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Module</label>
                    <select class="form-control" disabled>
                        <option value="{{$ticket->outletreported}}">{{$ticket->module}}
                    </select>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <label>Sub Module</label>
                    <select class="form-control" disabled>
                        <option value="{{$ticket->outletreported}}">{{$ticket->submodule}}
                    </select>
                </div>
                <div class="col-sm-3 mb-3 mt-3 mb-sm-0"></div>

            </div>
        </div>
    </div>

</div>


@endsection