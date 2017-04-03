@extends('layouts.hospital')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.docter.manage') }}">Docter</a></li>

        </ol>
        <div class="page-heading">
            <h1>Docter<small>Add Data</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => isset($update) ? ['hospital.docter.update', $model->id] : 'hospital.docter.store','files' => true]) !!}
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
                                    <label for="name" class="control-label">Docter Name</label>
                                    {!! Form::text('name',$model->name, ['id'=>'name','placeholder'=>'Docter Name','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="total_room" class="control-label">Speciality</label>
                                    {!! Form::select('jenis', [
                                                                'Kardiolog' => 'Kardiolog',
                                                                'Audiolog' => 'Audiolog',
                                                                'Gigi' => 'Gigi',
                                                                'THT' => 'THT',
                                                                'Ginekolog' => 'Ginekolog',
                                                                'Ortopedi' => 'Ortopedi',
                                                                'Psikiater' => 'Psikiater',
                                                                'Radiolog' => 'Radiolog',
                                                                'Endokrinologi' => 'Endokrinologi',
                                                                'Saraf' => 'Saraf',
                                                                'Dokter paru-paru' => 'Dokter paru-paru',
                                                                'Dokter bedah jantung' => 'Dokter bedah jantung',
                                                                'Dokter anak' => 'Dokter anak',
                                                            ],
                                                    $model->jenis,
                                                    ['id'=>'jenis','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                                {{ Form::submit('Save',['class'=>'btn btn-primary btn-raised']) }}
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
@endpush