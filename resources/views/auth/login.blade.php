@extends('layouts.auth')

@section('content')
<div class="container" id="login-form">
    <a href="{{ url('/') }}" class="login-logo"><img src="{{ url('assets') }}/img/small-logo.png"></a>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <form method="POST" action="{{ url('/login') }}" class="form-horizontal" id="validate-form">
                    {{ csrf_field() }}
                <div class="panel-heading">
                    <h2>Login Form</h2>
                </div>
                <div class="panel-body">
                        <div class="form-group mb-md">
                            <div class="col-xs-12">
                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<span class="input-group-addon">
											<i class="ti ti-user"></i>
										</span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" data-parsley-minlength="6" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-md">
                            <div class="col-xs-12">
                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<span class="input-group-addon">
											<i class="ti ti-key"></i>
										</span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="col-xs-12">
                                <div class="checkbox-inline icheck pull-right p-n">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remeber me</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="panel-footer">
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary btn-raised pull-right">
                            Login
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
