@extends('layouts.app')

@section('title', 'Alert&PIC')

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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alert Telegram</h6>
        </div>
        @hasrole('Admin')
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
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
                            @foreach($list_alert as $result)
                            <tr>
                                <td>{{ $result->alertid }}</td>
                                <td>{{ $result->nodename }}</td>
                                <td>{{ $result->nodeipaddress }}</td>
                                <td>{{ $result->alertmessage }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @else
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
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
                            @foreach($list_alert as $result)
                            <tr>
                                @if($result->chatid == auth()->user()->chatid)
                                <td>{{ $result->alertid }}</td>
                                <td>{{ $result->nodename }}</td>
                                <td>{{ $result->nodeipaddress }}</td>
                                <td>{{ $result->alertmessage }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->created_at }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endhasrole
    </div>

</div>
@endsection