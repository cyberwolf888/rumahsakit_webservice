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
            <h1>Room<small>Add Data</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => isset($update) ? ['hospital.room.update', $model->id] : 'hospital.room.store','files' => true]) !!}
                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>Oh Snap!</h4>
                                <p>There is some error in your field value, please check field listed bellow.</p> <br>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close"></i>&nbsp; {{ $error }}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data Hospital</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Room Name</label>
                                    {!! Form::text('name',$model->name, ['id'=>'name','placeholder'=>'Room Name','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="total_room" class="control-label">Available Room</label>
                                    {!! Form::number('total_room', $model->total_room, ['id'=>'total_room','placeholder'=>'Available Room','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="control-label">Image</label><br>
                                    <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                                        <div>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Description</label>
                                    {!! Form::textarea('description', $model->description, ['id'=>'description','placeholder'=>'Description','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                                {{ Form::submit('Save',['class'=>'btn btn-primary btn-raised']) }}
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
                                <div class="form-group is-empty">
                                    <label for="akomodasi" class="control-label">Acomodation Fee</label>
                                    {!! Form::number('akomodasi', $model->akomodasi, ['id'=>'akomodasi','placeholder'=>'Acomodation Fee','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="perawatan" class="control-label">Maintain Fee</label>
                                    {!! Form::number('perawatan', $model->perawatan, ['id'=>'perawatan','placeholder'=>'Maintain Fee','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="visit_dokter" class="control-label">Doctor Visit Fee</label>
                                    {!! Form::number('visit_dokter', $model->visit_dokter, ['id'=>'visit_dokter','placeholder'=>'Doctor Visit Fee','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="administrasi" class="control-label">Administration Fee</label>
                                    {!! Form::number('administrasi', $model->administrasi, ['id'=>'administrasi','placeholder'=>'Administration Fee','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="total" class="control-label">Total Fee</label>
                                    {!! Form::number('total', $model->total, ['id'=>'total','placeholder'=>'Total Fee','class'=>'form-control', 'readonly']) !!}
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
@endsection

@push('plugin_scripts')
<!-- Initialize scripts for this page-->
<script src="{{ url('assets') }}/plugins/form-jasnyupload/fileinput.min.js"></script>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        var akomodasi = $("#akomodasi");
        var perawatan = $("#perawatan");
        var visit_dokter = $("#visit_dokter");
        var administrasi = $("#administrasi");
        var e_total = $("#total");

        akomodasi.change(function () {
            total();
        });
        perawatan.change(function () {
            total();
        });
        visit_dokter.change(function () {
            total();
        });
        administrasi.change(function () {
            total();
        });
        function total() {
            e_total.val(parseInt(akomodasi.val())+parseInt(perawatan.val())+parseInt(visit_dokter.val())+parseInt(administrasi.val()));
        }
    });
</script>
@endpush