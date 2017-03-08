@extends('layouts.admin')

@push('plugin_css')
@endpush

@section('content')
    <div class="page-content">
        <ol class="breadcrumb">

            <li class=""><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active"><a href="{{ route('admin.hospital.manage') }}">Hospital</a></li>

        </ol>
        <div class="page-heading">
            <h1>Hospital<small>Detail</small></h1>
            <div class="options">
            </div>
        </div>
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                            <div class="panel-heading">
                                <h2>Data User</h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
                            </div>
                            <div class="panel-body" >
                                <table class="table table-bordered m-n" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ url('images/hospital/thumb_'.$model->image) }}" class="img-responsive">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Hospital Name</small></h4>
                                            <h4>{{ $model->name }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Telephone</small></h4>
                                            <h4>{{ $model->telp }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Address</small></h4>
                                            <h4>{{ $model->address }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Description</small></h4>
                                            <h4>{{ $model->description }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4><small>Status</small></h4>
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