@extends('layouts.hospital')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.reservation.manage') }}">Reservation</a></li>

        </ol>
        <div class="page-heading">
            <h1>Reservation<small>Detail</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            @if($model->status == \App\Models\Reservation::STATUS_NEW || $model->status == \App\Models\Reservation::STATUS_CONFIRMED)
                <a class="btn btn-lg btn-danger btn-raised btn-label" href="{{ route('hospital.reservation.cancel',$model->id) }}"><i class="fa fa-ban"></i> Cancel<div class="ripple-container"></div></a>
            @endif

            @if($model->status == \App\Models\Reservation::STATUS_NEW)
                <a class="btn btn-lg btn-primary btn-raised btn-label" href="{{ route('hospital.reservation.confirmed',$model->id) }}"><i class="fa fa-check"></i> Confirm<div class="ripple-container"></div></a>
            @endif

            @if($model->status == \App\Models\Reservation::STATUS_CONFIRMED)
                <a class="btn btn-lg btn-success btn-raised btn-label" href="{{ route('hospital.reservation.completed',$model->id) }}"><i class="fa fa-check"></i> Complete<div class="ripple-container"></div></a>
            @endif
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Member</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Member Name</small></h4>
                                            <h4>{{ $model->member->name }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Telephone</small></h4>
                                            <h4>{{ $model->member->telp }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Member ID Number</small></h4>
                                            <h4>{{ $model->member->no_id }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Member Address</small></h4>
                                            <h4>{{ $model->member->address }}</h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Reservation</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Hospital</small></h4>
                                            <h4>{{ $model->hospital->name }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Room Name</small></h4>
                                            <h4>{{ $model->room->name }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Check-in Date</small></h4>
                                            <h4>{{ date('d F Y',strtotime($model->checkin)) }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Check-outDate</small></h4>
                                            <h4>{{ date('d F Y', strtotime("+".$model->duration." days", strtotime($model->checkin))) }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Duration</small></h4>
                                            <h4>{{ $model->duration }} day</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Total Fee</small></h4>
                                            <h4>Rp {{ number_format($model->total,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Reservation Status</small></h4>
                                            <h4>{{ $model->getStatus() }}</h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
<script>

</script>
@endpush