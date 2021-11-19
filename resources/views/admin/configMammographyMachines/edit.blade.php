@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.configMammographyMachine.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.config-mammography-machines.update", [$configMammographyMachine->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('hospital_name') ? 'has-error' : '' }}">
                            <label class="required" for="hospital_name">{{ trans('cruds.configMammographyMachine.fields.hospital_name') }}</label>
                            <input class="form-control" type="text" name="hospital_name" id="hospital_name" value="{{ old('hospital_name', $configMammographyMachine->hospital_name) }}" required>
                            @if($errors->has('hospital_name'))
                                <span class="help-block" role="alert">{{ $errors->first('hospital_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.hospital_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('machine_name') ? 'has-error' : '' }}">
                            <label class="required" for="machine_name">{{ trans('cruds.configMammographyMachine.fields.machine_name') }}</label>
                            <input class="form-control" type="text" name="machine_name" id="machine_name" value="{{ old('machine_name', $configMammographyMachine->machine_name) }}" required>
                            @if($errors->has('machine_name'))
                                <span class="help-block" role="alert">{{ $errors->first('machine_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.machine_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ae_title') ? 'has-error' : '' }}">
                            <label class="required" for="ae_title">{{ trans('cruds.configMammographyMachine.fields.ae_title') }}</label>
                            <input class="form-control" type="text" name="ae_title" id="ae_title" value="{{ old('ae_title', $configMammographyMachine->ae_title) }}" required>
                            @if($errors->has('ae_title'))
                                <span class="help-block" role="alert">{{ $errors->first('ae_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.ae_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('port_number') ? 'has-error' : '' }}">
                            <label for="port_number">{{ trans('cruds.configMammographyMachine.fields.port_number') }}</label>
                            <input class="form-control" type="text" name="port_number" id="port_number" value="{{ old('port_number', $configMammographyMachine->port_number) }}">
                            @if($errors->has('port_number'))
                                <span class="help-block" role="alert">{{ $errors->first('port_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.port_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('main_ip') ? 'has-error' : '' }}">
                            <label for="main_ip">{{ trans('cruds.configMammographyMachine.fields.main_ip') }}</label>
                            <input class="form-control" type="text" name="main_ip" id="main_ip" value="{{ old('main_ip', $configMammographyMachine->main_ip) }}">
                            @if($errors->has('main_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('main_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.main_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('configured_ip') ? 'has-error' : '' }}">
                            <label for="configured_ip">{{ trans('cruds.configMammographyMachine.fields.configured_ip') }}</label>
                            <input class="form-control" type="text" name="configured_ip" id="configured_ip" value="{{ old('configured_ip', $configMammographyMachine->configured_ip) }}">
                            @if($errors->has('configured_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('configured_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.configured_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('host_name') ? 'has-error' : '' }}">
                            <label for="host_name">{{ trans('cruds.configMammographyMachine.fields.host_name') }}</label>
                            <input class="form-control" type="text" name="host_name" id="host_name" value="{{ old('host_name', $configMammographyMachine->host_name) }}">
                            @if($errors->has('host_name'))
                                <span class="help-block" role="alert">{{ $errors->first('host_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.host_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.configMammographyMachine.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ConfigMammographyMachine::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $configMammographyMachine->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.configMammographyMachine.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection