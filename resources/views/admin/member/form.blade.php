@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.member.manage') }}">Member</a></li>

        </ol>
        <div class="page-heading">
            <h1>Manage User<small>Member</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                {!! Form::open(['route' => isset($update) ? ['admin.member.update', $model->id] : 'admin.member.store']) !!}
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
                                <h2>Data Member</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <div class="form-group is-empty">
                                    <label for="name" class="control-label">Member Name</label>
                                    {!! Form::text('name', $model->name, ['id'=>'name','placeholder'=>'Member Name','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="telp" class="control-label">Phone Number</label>
                                    {!! Form::number('telp', $model->telp, ['id'=>'telp','placeholder'=>'Phone Number','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                    <label for="no_id" class="control-label">ID Number (KTP/SIM/Paspor)</label>
                                    {!! Form::text('no_id', $model->no_id, ['id'=>'no_id','placeholder'=>'Phone Number','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="address" class="control-label">Member Address</label>
                                    {!! Form::text('address', $model->address, ['id'=>'address','placeholder'=>'Member Address','class'=>'form-control', 'required']) !!}
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
                                <h2>Data User</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <div class="form-group is-empty">
                                    <label for="email" class="control-label">Email</label>
                                    {!! Form::email('email', $user->email, ['id'=>'email','placeholder'=>'Email','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="password" class="control-label">Password</label>
                                    {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group is-empty">
                                    <label for="password_confirmation" class="control-label">Confirm Password</label>
                                    {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'Confirm Password','class'=>'form-control', 'required']) !!}
                                    <span class="material-input"></span>
                                </div>
                                @if(isset($update))
                                    <div class="form-group">
                                        <label for="status" class="control-label">Member Status</label>
                                        {!! Form::select('status', ['1' => 'Active', '0' => 'Suspend'], $model->status, ['class'=>'form-control','required']) !!}
                                        <span class="material-input"></span>
                                    </div>
                                @endif
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
@endpush

@push('scripts')
@endpush