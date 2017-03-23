@extends('layouts.hospital')

@push('plugin_css')
<link href="{{ url('assets') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.reservation.manage') }}">Reservation</a></li>

        </ol>
        <div class="page-heading">
            <h1>Reservation<small>Manage</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Data Reservation</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Member Name</th>
                                        <th>Room Name</th>
                                        <th>Check-in</th>
                                        <th>Duration</th>
                                        <th>Deposit</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $row->member->name }}</td>
                                            <td>{{ $row->room->name }}</td>
                                            <td>{{ date('d F Y',strtotime($row->checkin)) }}</td>
                                            <td>{{ $row->duration }} day</td>
                                            <td>Rp {{ number_format($row->total,0,',','.') }}</td>
                                            <td>{{ $row->getStatus() }}</td>
                                            <td>{{ date('d/m/Y',strtotime($row->created_at)) }}</td>
                                            <td class="center" width="130">
                                                <a href="{{ route('hospital.reservation.detail',$row->id) }}" class="btn btn-info btn-raised btn-xs"><i class="fa fa-eye"></i><div class="ripple-container"></div></a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ url('assets') }}/plugins/datatables/dataTables.bootstrap.js"></script>
@endpush

@push('scripts')
<script>
    // -------------------------------
    // Initialize Data Tables
    // -------------------------------

    $(document).ready(function() {
        $('#example').dataTable({
            "language": {
                "lengthMenu": "_MENU_"
            },
            "aaSorting": []
        });
        $('.dataTables_filter input').attr('placeholder','Search...');


        //DOM Manipulation to move datatable elements integrate to panel
        $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
        $('.panel-ctrls').append("<i class='separator'></i>");
        $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

        $('.panel-footer').append($(".dataTable+.row"));
        $('.dataTables_paginate>ul.pagination').addClass("pull-right m-n");

    });
</script>
@endpush