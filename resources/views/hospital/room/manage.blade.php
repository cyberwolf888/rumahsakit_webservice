@extends('layouts.hospital')

@push('plugin_css')
<link href="{{ url('assets') }}/plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets') }}/plugins/datatables/dataTables.themify.css" type="text/css" rel="stylesheet">
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.room.manage') }}">Room</a></li>

        </ol>
        <div class="page-heading">
            <h1>Room<small>Manage</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-lg btn-primary btn-raised btn-label" href="{{ route('hospital.room.create') }}"><i class="fa fa-plus"></i> Add New Data<div class="ripple-container"></div></a>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2>Data Room</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Available Room</th>
                                        <th>Total Fee</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td><img src="{{ url('images/room/thumb_'.$row->image) }}"></td>
                                            <td>{{ $row->description }}</td>
                                            <td>{{ $row->total_room }}</td>
                                            <td>{{ number_format($row->total,0,',','.') }}</td>
                                            <td class="center" width="130">
                                                <a href="{{ route('hospital.room.edit',$row->id) }}" class="btn btn-warning btn-raised btn-xs"><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
                                                <a href="javascript:null" data-id="{{ $row->id }}" class="btn btn-danger btn-raised btn-xs hapus"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                                                <a href="{{ route('hospital.room.detail',$row->id) }}" class="btn btn-info btn-raised btn-xs"><i class="fa fa-eye"></i><div class="ripple-container"></div></a>
                                            </td>
                                        </tr>
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

<script>
    $(".hapus").click(function () {
        var id = $(this).data("id");
        var p = confirm('Are you sure to delete this data?');
        if(p==true){
            window.location = "<?= url('hospital/room/delete') ?>/"+id;
        }else{

        }
    });
</script>
@endpush