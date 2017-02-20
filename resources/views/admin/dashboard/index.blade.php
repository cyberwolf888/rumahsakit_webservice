@extends('layouts.admin')

@push('plugin_css')
<link href="{{ url('assets') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets') }}/less/card.less" type="text/css" rel="stylesheet">

<link href="{{ url('assets') }}/plugins/chartist/dist/chartist.min.css" type="text/css" rel="stylesheet"> <!-- chartist -->
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ url('admin') }}">Home</a></li>
            <li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>

        </ol>
        <div class="page-heading">
            <h1>Dashboard<small>Project Statistics</small></h1>
            <div class="options">
            <!--  <div class="btn-toolbar">
        <form action="" class="form-horizontal row-border" style="display: inline-block;">
            <div class="form-group hidden-xs">
                <div class="col-sm-8">
                    <button class="btn btn-default" id="daterangepicker-d">
                        <i class="fa fa-calendar"></i>
                        <span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
                    </button>
                </div>
            </div>
        </form>
        <a href="#" class="btn btn-default" style="vertical-align: top;">Settings</a>
    </div> -->
            </div>
        </div>
        <div class="container-fluid">


            <div data-widget-group="group1">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-indigo">
                            <div class="info">
                                <div class="tile-heading"><span>Total Member</span></div>
                                <div class="tile-body"><span>{{ $total_member }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-indigo"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-danger">
                            <div class="info">
                                <div class="tile-heading"><span>Total Hospital</span></div>
                                <div class="tile-body "><span>{{ $total_hospital }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-gray"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-primary">
                            <div class="info">
                                <div class="tile-heading"><span>Total Admin</span></div>
                                <div class="tile-body "><span>{{ $total_admin }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-primary"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 full-width">
                        <div class="panel panel-default no-shadow" data-widget='{"draggable": "false"}'>
                            <div class="panel-body">
                                <div class="pb-md">
                                    <h4 class="mb-n">Last 5 New Hospital<small>All Hospital.</small></h4>

                                </div>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($model as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->user->email }}</td>
                                            <td>{{ $row->telp }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td> {{ $row->getStatus() }}</td>
                                            <td class="center" width="130">
                                                @if($row->status == \App\Models\Hospital::STATUS_NOT_COMPLETE || $row->status == \App\Models\Hospital::STATUS_SUSPEND)
                                                    <a href="javascript:null" data-id="{{ $row->id }}" class="btn btn-danger btn-raised btn-xs hapus"><i class="fa fa-close"></i><div class="ripple-container"></div></a>
                                                @endif

                                                @if($row->status == \App\Models\Hospital::STATUS_ACTIVE)
                                                    <a href="{{ route('admin.hospital.edit',$row->id) }}" class="btn btn-warning btn-raised btn-xs"><i class="fa fa-pencil"></i><div class="ripple-container"></div></a>
                                                    <a href="{{ route('admin.hospital.detail',$row->id) }}" class="btn btn-info btn-raised btn-xs"><i class="fa fa-eye"></i><div class="ripple-container"></div></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')

<!-- <script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> --> <!-- DateTime Picker -->

<!-- <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>   -->    <!-- jVectorMap -->
<!-- <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>  --> <!--World Map-->
<script src="{{ url('assets') }}/plugins/chartist/dist/chartist.min.js"></script> <!-- chartist -->
<script src="{{ url('assets') }}/demo/demo-index.js"></script>                                     <!-- Initialize scripts for this page-->
@endpush

@push('scripts')
@endpush