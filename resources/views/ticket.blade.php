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

    @hasrole('Admin')
    <!-- DataTables Ticket -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Incident Tickets</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
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
                        @foreach ($trx_tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->alertid}}</td>
                            <td>
                                {{$ticket->name}}
                                <!-- @if(is_null($ticket->name))
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#assignModal{{$ticket->id}}">Assign Now
                                </a>
                                <div class="modal fade" id="assignModal{{$ticket->id}}" tabindex="-1" role="dialog" aria-hidden=" true">
                                    <div class="modal-dialog" role="document">
                                        <form id="pic-assign-form" method="POST" action="{{ route('trx_ticket.update', ['ticket' => $ticket->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="assignModalExample">Assign PIC for this Incident!</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Select A PIC Below!.

                                                    <select class="form-control" name="username" id="username">
                                                        <option selected disabled>Select PIC</option>
                                                        @foreach ($users as $user)
                                                        <option value="{{$user->name}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">
                                                        Assign
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @else
                                {{ $ticket->name }}
                                @endif -->
                            </td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->tickettype}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td style="text-align: center;"><a href="{{ route('trx_ticket.show', [$ticket->id]) }}" class="btn btn-primary m-2">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @else
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Incident Tickets</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="myTable" width="100%" cellspacing="0">
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
                        @foreach ($trx_tickets as $ticket)
                        @if($ticket->chatid == auth()->user()->chatid)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->alertid}}</td>
                            <td>{{$ticket->name}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->tickettype}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td style="text-align: center;"><a href="{{ route('trx_ticket.show', [$ticket->id]) }}" class="btn btn-primary m-2">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endhasrole
</div>
@endsection