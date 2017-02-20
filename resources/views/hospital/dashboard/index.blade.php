@extends('layouts.hospital')

@push('plugin_css')
<link href="{{ url('assets') }}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" type="text/css" rel="stylesheet">
<link href="{{ url('assets') }}/less/card.less" type="text/css" rel="stylesheet">

<link href="{{ url('assets') }}/plugins/chartist/dist/chartist.min.css" type="text/css" rel="stylesheet"> <!-- chartist -->
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ url('hospital') }}">Home</a></li>
            <li class="active"><a href="{{ url('hospital') }}">Dashboard</a></li>

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
                                <div class="tile-heading"><span>Total Room</span></div>
                                <div class="tile-body"><span>{{ $total_room }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-indigo"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-danger">
                            <div class="info">
                                <div class="tile-heading"><span>Total Member</span></div>
                                <div class="tile-body "><span>{{ $total_member }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-gray"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-primary">
                            <div class="info">
                                <div class="tile-heading"><span>Total Transaction</span></div>
                                <div class="tile-body "><span>{{ $total_transaction }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-primary"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-success clearfix">
                            <div class="info">
                                <div class="tile-heading"><span>Total Profit</span></div>
                                <div class="tile-body "><span>{{ $total_profit }}</span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><div id="dashboard-sparkline-success"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 full-width">
                        <div class="panel panel-default no-shadow" data-widget='{"draggable": "false"}'>
                            <div class="panel-body">
                                <div class="pb-md">
                                    <h4 class="mb-n">Last 5 Transaction<small>All Transaction.</small></h4>

                                </div>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Member Name</th>
                                        <th>Room Name</th>
                                        <th>Check-in</th>
                                        <th>Duration</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($reservation as $row)
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