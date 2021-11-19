@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.machineStatusProfile.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.machine-status-profiles.update", [$machineStatusProfile->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('hospital_name') ? 'has-error' : '' }}">
                            <label class="required" for="hospital_name">{{ trans('cruds.machineStatusProfile.fields.hospital_name') }}</label>
                            <input class="form-control" type="text" name="hospital_name" id="hospital_name" value="{{ old('hospital_name', $machineStatusProfile->hospital_name) }}" required>
                            @if($errors->has('hospital_name'))
                                <span class="help-block" role="alert">{{ $errors->first('hospital_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.hospital_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.ct_center') }}</label>
                            <select class="form-control" name="ct_center" id="ct_center">
                                <option value disabled {{ old('ct_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::CT_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('ct_center', $machineStatusProfile->ct_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ct_center'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.ct_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.mri_center') }}</label>
                            <select class="form-control" name="mri_center" id="mri_center">
                                <option value disabled {{ old('mri_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::MRI_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mri_center', $machineStatusProfile->mri_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mri_center'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.mri_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mammography_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.mammography_center') }}</label>
                            <select class="form-control" name="mammography_center" id="mammography_center">
                                <option value disabled {{ old('mammography_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::MAMMOGRAPHY_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mammography_center', $machineStatusProfile->mammography_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mammography_center'))
                                <span class="help-block" role="alert">{{ $errors->first('mammography_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.mammography_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fpd_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.fpd_center') }}</label>
                            <select class="form-control" name="fpd_center" id="fpd_center">
                                <option value disabled {{ old('fpd_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::FPD_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('fpd_center', $machineStatusProfile->fpd_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fpd_center'))
                                <span class="help-block" role="alert">{{ $errors->first('fpd_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.fpd_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dr_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.dr_center') }}</label>
                            <select class="form-control" name="dr_center" id="dr_center">
                                <option value disabled {{ old('dr_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::DR_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('dr_center', $machineStatusProfile->dr_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dr_center'))
                                <span class="help-block" role="alert">{{ $errors->first('dr_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.dr_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cr_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.cr_center') }}</label>
                            <select class="form-control" name="cr_center" id="cr_center">
                                <option value disabled {{ old('cr_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::CR_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cr_center', $machineStatusProfile->cr_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cr_center'))
                                <span class="help-block" role="alert">{{ $errors->first('cr_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.cr_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('agfa_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.agfa_center') }}</label>
                            <select class="form-control" name="agfa_center" id="agfa_center">
                                <option value disabled {{ old('agfa_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::AGFA_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('agfa_center', $machineStatusProfile->agfa_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agfa_center'))
                                <span class="help-block" role="alert">{{ $errors->first('agfa_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.agfa_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('konica_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.konica_center') }}</label>
                            <select class="form-control" name="konica_center" id="konica_center">
                                <option value disabled {{ old('konica_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::KONICA_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('konica_center', $machineStatusProfile->konica_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('konica_center'))
                                <span class="help-block" role="alert">{{ $errors->first('konica_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.konica_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fier_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.fier_center') }}</label>
                            <select class="form-control" name="fier_center" id="fier_center">
                                <option value disabled {{ old('fier_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::FIER_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('fier_center', $machineStatusProfile->fier_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fier_center'))
                                <span class="help-block" role="alert">{{ $errors->first('fier_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.fier_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ecg_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.ecg_center') }}</label>
                            <select class="form-control" name="ecg_center" id="ecg_center">
                                <option value disabled {{ old('ecg_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::ECG_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('ecg_center', $machineStatusProfile->ecg_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ecg_center'))
                                <span class="help-block" role="alert">{{ $errors->first('ecg_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.ecg_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('simence_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.simence_center') }}</label>
                            <select class="form-control" name="simence_center" id="simence_center">
                                <option value disabled {{ old('simence_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::SIMENCE_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('simence_center', $machineStatusProfile->simence_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('simence_center'))
                                <span class="help-block" role="alert">{{ $errors->first('simence_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.simence_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gee_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.gee_center') }}</label>
                            <select class="form-control" name="gee_center" id="gee_center">
                                <option value disabled {{ old('gee_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::GEE_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gee_center', $machineStatusProfile->gee_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gee_center'))
                                <span class="help-block" role="alert">{{ $errors->first('gee_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.gee_center_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('philips_center') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.machineStatusProfile.fields.philips_center') }}</label>
                            <select class="form-control" name="philips_center" id="philips_center">
                                <option value disabled {{ old('philips_center', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineStatusProfile::PHILIPS_CENTER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('philips_center', $machineStatusProfile->philips_center) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('philips_center'))
                                <span class="help-block" role="alert">{{ $errors->first('philips_center') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineStatusProfile.fields.philips_center_helper') }}</span>
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