@extends('layouts.app')

@section('title', 'Import Users')

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
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Alert ID</th>
                                <th>Node</th>
                                <th>IP Address</th>
                                <th>Location</th>
                                <th>CPU Load</th>
                                <th>Percent Memory Used</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-warning">Warning</span>
                                </td>
                            </tr>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-danger">Critical</span>
                                </td>
                            </tr>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-warning">Warning</span>
                                </td>
                            </tr>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-warning">Warning</span>
                                </td>
                            </tr>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-danger">Critical</span>
                                </td>
                            </tr>
                            <tr>
                                <td>8274829</td>
                                <td>VMW-PROD-DB-SPAN</td>
                                <td>172.99.32.32</td>
                                <td>DC Sentul</td>
                                <td>14%</td>
                                <td>92%</td>
                                <td>
                                    <span class="badge bg-warning">Warning</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

</div>


@endsection