@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Ticket Incidents</h6>
        </div>
        @hasrole('Admin')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20%">Ticket ID</th>
                            <th width="20%">Alert ID</th>
                            <th width="20%">Assign To</th>
                            <th width="40%">Title</th>
                            <th width="40%">Ticket Type</th>
                            <th width="40%">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trx_tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->alertid}}</td>
                            <td>{{$ticket->chatid}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->tickettype}}</td>
                            <td>{{$ticket->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @else
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20%">Ticket ID</th>
                            <th width="20%">Alert ID</th>
                            <th width="20%">Assign To</th>
                            <th width="40%">Title</th>
                            <th width="40%">Ticket Type</th>
                            <th width="40%">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trx_tickets as $ticket)
                        <tr>
                            @if($ticket->chatid == auth()->user()->chatid)
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->alertid}}</td>
                            <td>{{$ticket->chatid}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->tickettype}}</td>
                            <td>{{$ticket->created_at}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endhasrole
    </div>

</div>


@endsection