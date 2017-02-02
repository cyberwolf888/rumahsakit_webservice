@extends('layouts.hospital')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.room.manage') }}">Room</a></li>

        </ol>
        <div class="page-heading">
            <h1>Room<small>Detail</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Hospital</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Room Name</small></h4>
                                            <h4>{{ $model->name }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Available Room</small></h4>
                                            <h4>{{ $model->total_room }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Room Image</small></h4>
                                            <img src="{{ url('images/room/thumb_'.$model->image) }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Room Description</small></h4>
                                            <h4>{{ $model->description }}</h4>
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
                                <h2>Room Fee</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h4><small>Acomodation Fee</small></h4>
                                            <h4>Rp {{ number_format($model->akomodasi,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Maintain Fee</small></h4>
                                            <h4>Rp {{ number_format($model->perawatan,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Doctor Visit Fee</small></h4>
                                            <h4>Rp {{ number_format($model->visit_dokter,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Administration Fee</small></h4>
                                            <h4>Rp {{ number_format($model->administrasi,0,',','.') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Total Fee</small></h4>
                                            <h4>Rp {{ number_format($model->total,0,',','.') }}</h4>
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
@endpush