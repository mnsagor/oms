@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.hospitalFiveCNetwork.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.hospital-five-c-networks.update", [$hospitalFiveCNetwork->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.hospitalFiveCNetwork.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $hospitalFiveCNetwork->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">
                            <label class="required" for="user_name">{{ trans('cruds.hospitalFiveCNetwork.fields.user_name') }}</label>
                            <input class="form-control" type="text" name="user_name" id="user_name" value="{{ old('user_name', $hospitalFiveCNetwork->user_name) }}" required>
                            @if($errors->has('user_name'))
                                <span class="help-block" role="alert">{{ $errors->first('user_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.user_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.hospitalFiveCNetwork.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.hospitalFiveCNetwork.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $hospitalFiveCNetwork->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.hospitalFiveCNetwork.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address', $hospitalFiveCNetwork->address) !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price_agreement_policy') ? 'has-error' : '' }}">
                            <label for="price_agreement_policy_id">{{ trans('cruds.hospitalFiveCNetwork.fields.price_agreement_policy') }}</label>
                            <select class="form-control select2" name="price_agreement_policy_id" id="price_agreement_policy_id">
                                @foreach($price_agreement_policies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('price_agreement_policy_id') ? old('price_agreement_policy_id') : $hospitalFiveCNetwork->price_agreement_policy->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('price_agreement_policy'))
                                <span class="help-block" role="alert">{{ $errors->first('price_agreement_policy') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.price_agreement_policy_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('connection_date') ? 'has-error' : '' }}">
                            <label class="required" for="connection_date">{{ trans('cruds.hospitalFiveCNetwork.fields.connection_date') }}</label>
                            <input class="form-control date" type="text" name="connection_date" id="connection_date" value="{{ old('connection_date', $hospitalFiveCNetwork->connection_date) }}" required>
                            @if($errors->has('connection_date'))
                                <span class="help-block" role="alert">{{ $errors->first('connection_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.connection_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cr_configuration') ? 'has-error' : '' }}">
                            <label for="cr_configuration_id">{{ trans('cruds.hospitalFiveCNetwork.fields.cr_configuration') }}</label>
                            <select class="form-control select2" name="cr_configuration_id" id="cr_configuration_id">
                                @foreach($cr_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('cr_configuration_id') ? old('cr_configuration_id') : $hospitalFiveCNetwork->cr_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cr_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('cr_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.cr_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cr_router_license_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.hospitalFiveCNetwork.fields.cr_router_license_status') }}</label>
                            <select class="form-control" name="cr_router_license_status" id="cr_router_license_status">
                                <option value disabled {{ old('cr_router_license_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::CR_ROUTER_LICENSE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cr_router_license_status', $hospitalFiveCNetwork->cr_router_license_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cr_router_license_status'))
                                <span class="help-block" role="alert">{{ $errors->first('cr_router_license_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.cr_router_license_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dr_configuration') ? 'has-error' : '' }}">
                            <label for="dr_configuration_id">{{ trans('cruds.hospitalFiveCNetwork.fields.dr_configuration') }}</label>
                            <select class="form-control select2" name="dr_configuration_id" id="dr_configuration_id">
                                @foreach($dr_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dr_configuration_id') ? old('dr_configuration_id') : $hospitalFiveCNetwork->dr_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dr_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('dr_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.dr_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dr_router_license_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.hospitalFiveCNetwork.fields.dr_router_license_status') }}</label>
                            <select class="form-control" name="dr_router_license_status" id="dr_router_license_status">
                                <option value disabled {{ old('dr_router_license_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::DR_ROUTER_LICENSE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('dr_router_license_status', $hospitalFiveCNetwork->dr_router_license_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dr_router_license_status'))
                                <span class="help-block" role="alert">{{ $errors->first('dr_router_license_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.dr_router_license_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mm_configuration') ? 'has-error' : '' }}">
                            <label for="mm_configuration_id">{{ trans('cruds.hospitalFiveCNetwork.fields.mm_configuration') }}</label>
                            <select class="form-control select2" name="mm_configuration_id" id="mm_configuration_id">
                                @foreach($mm_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mm_configuration_id') ? old('mm_configuration_id') : $hospitalFiveCNetwork->mm_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mm_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('mm_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.mm_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mm_router_license_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.hospitalFiveCNetwork.fields.mm_router_license_status') }}</label>
                            <select class="form-control" name="mm_router_license_status" id="mm_router_license_status">
                                <option value disabled {{ old('mm_router_license_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::MM_ROUTER_LICENSE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mm_router_license_status', $hospitalFiveCNetwork->mm_router_license_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mm_router_license_status'))
                                <span class="help-block" role="alert">{{ $errors->first('mm_router_license_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.mm_router_license_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_configuration') ? 'has-error' : '' }}">
                            <label for="ct_configuration_id">{{ trans('cruds.hospitalFiveCNetwork.fields.ct_configuration') }}</label>
                            <select class="form-control select2" name="ct_configuration_id" id="ct_configuration_id">
                                @foreach($ct_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ct_configuration_id') ? old('ct_configuration_id') : $hospitalFiveCNetwork->ct_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ct_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.ct_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_router_license_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.hospitalFiveCNetwork.fields.ct_router_license_status') }}</label>
                            <select class="form-control" name="ct_router_license_status" id="ct_router_license_status" required>
                                <option value disabled {{ old('ct_router_license_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::CT_ROUTER_LICENSE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('ct_router_license_status', $hospitalFiveCNetwork->ct_router_license_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ct_router_license_status'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_router_license_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.ct_router_license_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_configuration') ? 'has-error' : '' }}">
                            <label for="mri_configuration_id">{{ trans('cruds.hospitalFiveCNetwork.fields.mri_configuration') }}</label>
                            <select class="form-control select2" name="mri_configuration_id" id="mri_configuration_id">
                                @foreach($mri_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mri_configuration_id') ? old('mri_configuration_id') : $hospitalFiveCNetwork->mri_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mri_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.mri_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_router_license_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.hospitalFiveCNetwork.fields.mri_router_license_status') }}</label>
                            <select class="form-control" name="mri_router_license_status" id="mri_router_license_status" required>
                                <option value disabled {{ old('mri_router_license_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::MRI_ROUTER_LICENSE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mri_router_license_status', $hospitalFiveCNetwork->mri_router_license_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mri_router_license_status'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_router_license_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.mri_router_license_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dropbox_mail_ip') ? 'has-error' : '' }}">
                            <label for="dropbox_mail_ip">{{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_mail_ip') }}</label>
                            <input class="form-control" type="text" name="dropbox_mail_ip" id="dropbox_mail_ip" value="{{ old('dropbox_mail_ip', $hospitalFiveCNetwork->dropbox_mail_ip) }}">
                            @if($errors->has('dropbox_mail_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('dropbox_mail_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_mail_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dropbox_password') ? 'has-error' : '' }}">
                            <label for="dropbox_password">{{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_password') }}</label>
                            <input class="form-control" type="text" name="dropbox_password" id="dropbox_password" value="{{ old('dropbox_password', $hospitalFiveCNetwork->dropbox_password) }}">
                            @if($errors->has('dropbox_password'))
                                <span class="help-block" role="alert">{{ $errors->first('dropbox_password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospital_hr') ? 'has-error' : '' }}">
                            <label for="hospital_hr_id">{{ trans('cruds.hospitalFiveCNetwork.fields.hospital_hr') }}</label>
                            <select class="form-control select2" name="hospital_hr_id" id="hospital_hr_id">
                                @foreach($hospital_hrs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('hospital_hr_id') ? old('hospital_hr_id') : $hospitalFiveCNetwork->hospital_hr->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hospital_hr'))
                                <span class="help-block" role="alert">{{ $errors->first('hospital_hr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.hospital_hr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('profit_sharing_rate') ? 'has-error' : '' }}">
                            <label for="profit_sharing_rate">{{ trans('cruds.hospitalFiveCNetwork.fields.profit_sharing_rate') }}</label>
                            <input class="form-control" type="number" name="profit_sharing_rate" id="profit_sharing_rate" value="{{ old('profit_sharing_rate', $hospitalFiveCNetwork->profit_sharing_rate) }}" step="1">
                            @if($errors->has('profit_sharing_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('profit_sharing_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.profit_sharing_rate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bill_mail') ? 'has-error' : '' }}">
                            <label for="bill_mail">{{ trans('cruds.hospitalFiveCNetwork.fields.bill_mail') }}</label>
                            <input class="form-control" type="email" name="bill_mail" id="bill_mail" value="{{ old('bill_mail', $hospitalFiveCNetwork->bill_mail) }}">
                            @if($errors->has('bill_mail'))
                                <span class="help-block" role="alert">{{ $errors->first('bill_mail') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.bill_mail_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('management_software_propose') ? 'has-error' : '' }}">
                            <label for="management_software_propose">{{ trans('cruds.hospitalFiveCNetwork.fields.management_software_propose') }}</label>
                            <textarea class="form-control ckeditor" name="management_software_propose" id="management_software_propose">{!! old('management_software_propose', $hospitalFiveCNetwork->management_software_propose) !!}</textarea>
                            @if($errors->has('management_software_propose'))
                                <span class="help-block" role="alert">{{ $errors->first('management_software_propose') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.management_software_propose_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('installed_by') ? 'has-error' : '' }}">
                            <label for="installed_by">{{ trans('cruds.hospitalFiveCNetwork.fields.installed_by') }}</label>
                            <input class="form-control" type="text" name="installed_by" id="installed_by" value="{{ old('installed_by', $hospitalFiveCNetwork->installed_by) }}">
                            @if($errors->has('installed_by'))
                                <span class="help-block" role="alert">{{ $errors->first('installed_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.installed_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mininum_charge') ? 'has-error' : '' }}">
                            <label for="mininum_charge">{{ trans('cruds.hospitalFiveCNetwork.fields.mininum_charge') }}</label>
                            <input class="form-control" type="number" name="mininum_charge" id="mininum_charge" value="{{ old('mininum_charge', $hospitalFiveCNetwork->mininum_charge) }}" step="0.01">
                            @if($errors->has('mininum_charge'))
                                <span class="help-block" role="alert">{{ $errors->first('mininum_charge') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.mininum_charge_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('annual_fee') ? 'has-error' : '' }}">
                            <label for="annual_fee">{{ trans('cruds.hospitalFiveCNetwork.fields.annual_fee') }}</label>
                            <input class="form-control" type="number" name="annual_fee" id="annual_fee" value="{{ old('annual_fee', $hospitalFiveCNetwork->annual_fee) }}" step="0.01">
                            @if($errors->has('annual_fee'))
                                <span class="help-block" role="alert">{{ $errors->first('annual_fee') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.annual_fee_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('others_company_name') ? 'has-error' : '' }}">
                            <label for="others_company_name">{{ trans('cruds.hospitalFiveCNetwork.fields.others_company_name') }}</label>
                            <input class="form-control" type="text" name="others_company_name" id="others_company_name" value="{{ old('others_company_name', $hospitalFiveCNetwork->others_company_name) }}">
                            @if($errors->has('others_company_name'))
                                <span class="help-block" role="alert">{{ $errors->first('others_company_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.others_company_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('router_reinstallation_date') ? 'has-error' : '' }}">
                            <label for="router_reinstallation_date">{{ trans('cruds.hospitalFiveCNetwork.fields.router_reinstallation_date') }}</label>
                            <input class="form-control date" type="text" name="router_reinstallation_date" id="router_reinstallation_date" value="{{ old('router_reinstallation_date', $hospitalFiveCNetwork->router_reinstallation_date) }}">
                            @if($errors->has('router_reinstallation_date'))
                                <span class="help-block" role="alert">{{ $errors->first('router_reinstallation_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.router_reinstallation_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('connection_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.hospitalFiveCNetwork.fields.connection_status') }}</label>
                            <select class="form-control" name="connection_status" id="connection_status">
                                <option value disabled {{ old('connection_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\HospitalFiveCNetwork::CONNECTION_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('connection_status', $hospitalFiveCNetwork->connection_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('connection_status'))
                                <span class="help-block" role="alert">{{ $errors->first('connection_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.connection_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('conncetion_status_reason') ? 'has-error' : '' }}">
                            <label for="conncetion_status_reason">{{ trans('cruds.hospitalFiveCNetwork.fields.conncetion_status_reason') }}</label>
                            <textarea class="form-control" name="conncetion_status_reason" id="conncetion_status_reason">{{ old('conncetion_status_reason', $hospitalFiveCNetwork->conncetion_status_reason) }}</textarea>
                            @if($errors->has('conncetion_status_reason'))
                                <span class="help-block" role="alert">{{ $errors->first('conncetion_status_reason') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.conncetion_status_reason_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('agreement_attachment') ? 'has-error' : '' }}">
                            <label for="agreement_attachment">{{ trans('cruds.hospitalFiveCNetwork.fields.agreement_attachment') }}</label>
                            <div class="needsclick dropzone" id="agreement_attachment-dropzone">
                            </div>
                            @if($errors->has('agreement_attachment'))
                                <span class="help-block" role="alert">{{ $errors->first('agreement_attachment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.agreement_attachment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('machine_available_profile') ? 'has-error' : '' }}">
                            <label for="machine_available_profile_id">{{ trans('cruds.hospitalFiveCNetwork.fields.machine_available_profile') }}</label>
                            <select class="form-control select2" name="machine_available_profile_id" id="machine_available_profile_id">
                                @foreach($machine_available_profiles as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('machine_available_profile_id') ? old('machine_available_profile_id') : $hospitalFiveCNetwork->machine_available_profile->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('machine_available_profile'))
                                <span class="help-block" role="alert">{{ $errors->first('machine_available_profile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalFiveCNetwork.fields.machine_available_profile_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.hospital-five-c-networks.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $hospitalFiveCNetwork->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedAgreementAttachmentMap = {}
Dropzone.options.agreementAttachmentDropzone = {
    url: '{{ route('admin.hospital-five-c-networks.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="agreement_attachment[]" value="' + response.name + '">')
      uploadedAgreementAttachmentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAgreementAttachmentMap[file.name]
      }
      $('form').find('input[name="agreement_attachment[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($hospitalFiveCNetwork) && $hospitalFiveCNetwork->agreement_attachment)
          var files =
            {!! json_encode($hospitalFiveCNetwork->agreement_attachment) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="agreement_attachment[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection