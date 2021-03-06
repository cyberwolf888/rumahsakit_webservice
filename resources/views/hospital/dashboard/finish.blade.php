@extends('layouts.hospital')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('hospital.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('hospital.finish.index') }}">Hospital</a></li>

        </ol>
        <div class="page-heading">
            <h1>Complete Account<small>Hospital</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => 'hospital.finish.store', 'files' => true]) !!}
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
                                    <label for="name" class="control-label">Hospital Name</label>
                                    {!! Form::text('name', Auth::user()->name, ['id'=>'name','placeholder'=>'Hospital Name','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Phone Number</label>
                                    {!! Form::number('telp', null, ['id'=>'telp','placeholder'=>'Phone Number','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Address</label>
                                    {!! Form::text('address', null, ['id'=>'address','placeholder'=>'Address','class'=>'form-control', 'required']) !!}
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
                                <h2>Data Hospital</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <div class="form-group">
                                    <label for="nama" class="control-label">Image</label><br>
                                    <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                                        <div>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image" required></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Description</label>
                                    {!! Form::textarea('description', null, ['id'=>'description','placeholder'=>'Description','class'=>'form-control', 'rows'=>3,'required']) !!}
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
@endpush