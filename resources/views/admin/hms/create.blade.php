@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.hm.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.hms.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.hm.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                            <label class="required" for="username">{{ trans('cruds.hm.fields.username') }}</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                            @if($errors->has('username'))
                                <span class="help-block" role="alert">{{ $errors->first('username') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.username_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.hm.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.hm.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address') !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.hm.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('connection_date') ? 'has-error' : '' }}">
                            <label for="connection_date">{{ trans('cruds.hm.fields.connection_date') }}</label>
                            <input class="form-control date" type="text" name="connection_date" id="connection_date" value="{{ old('connection_date') }}">
                            @if($errors->has('connection_date'))
                                <span class="help-block" role="alert">{{ $errors->first('connection_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.connection_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('network_ip') ? 'has-error' : '' }}">
                            <label for="network_ip">{{ trans('cruds.hm.fields.network_ip') }}</label>
                            <input class="form-control" type="text" name="network_ip" id="network_ip" value="{{ old('network_ip', '') }}">
                            @if($errors->has('network_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('network_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.network_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pathology_ip') ? 'has-error' : '' }}">
                            <label for="pathology_ip">{{ trans('cruds.hm.fields.pathology_ip') }}</label>
                            <input class="form-control" type="text" name="pathology_ip" id="pathology_ip" value="{{ old('pathology_ip', '') }}">
                            @if($errors->has('pathology_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('pathology_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.pathology_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reception_ip') ? 'has-error' : '' }}">
                            <label for="reception_ip">{{ trans('cruds.hm.fields.reception_ip') }}</label>
                            <input class="form-control" type="text" name="reception_ip" id="reception_ip" value="{{ old('reception_ip', '') }}">
                            @if($errors->has('reception_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('reception_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.reception_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('xray_ip') ? 'has-error' : '' }}">
                            <label for="xray_ip">{{ trans('cruds.hm.fields.xray_ip') }}</label>
                            <input class="form-control" type="text" name="xray_ip" id="xray_ip" value="{{ old('xray_ip', '') }}">
                            @if($errors->has('xray_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('xray_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.xray_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ultrasonography_ip') ? 'has-error' : '' }}">
                            <label for="ultrasonography_ip">{{ trans('cruds.hm.fields.ultrasonography_ip') }}</label>
                            <input class="form-control" type="text" name="ultrasonography_ip" id="ultrasonography_ip" value="{{ old('ultrasonography_ip', '') }}">
                            @if($errors->has('ultrasonography_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('ultrasonography_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.ultrasonography_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('admin_ip') ? 'has-error' : '' }}">
                            <label for="admin_ip">{{ trans('cruds.hm.fields.admin_ip') }}</label>
                            <input class="form-control" type="text" name="admin_ip" id="admin_ip" value="{{ old('admin_ip', '') }}">
                            @if($errors->has('admin_ip'))
                                <span class="help-block" role="alert">{{ $errors->first('admin_ip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.admin_ip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chairman_name') ? 'has-error' : '' }}">
                            <label for="chairman_name">{{ trans('cruds.hm.fields.chairman_name') }}</label>
                            <input class="form-control" type="text" name="chairman_name" id="chairman_name" value="{{ old('chairman_name', '') }}">
                            @if($errors->has('chairman_name'))
                                <span class="help-block" role="alert">{{ $errors->first('chairman_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.chairman_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chairman_number') ? 'has-error' : '' }}">
                            <label for="chairman_number">{{ trans('cruds.hm.fields.chairman_number') }}</label>
                            <input class="form-control" type="text" name="chairman_number" id="chairman_number" value="{{ old('chairman_number', '') }}">
                            @if($errors->has('chairman_number'))
                                <span class="help-block" role="alert">{{ $errors->first('chairman_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.chairman_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('md_name') ? 'has-error' : '' }}">
                            <label for="md_name">{{ trans('cruds.hm.fields.md_name') }}</label>
                            <input class="form-control" type="text" name="md_name" id="md_name" value="{{ old('md_name', '') }}">
                            @if($errors->has('md_name'))
                                <span class="help-block" role="alert">{{ $errors->first('md_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.md_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('md_number') ? 'has-error' : '' }}">
                            <label for="md_number">{{ trans('cruds.hm.fields.md_number') }}</label>
                            <input class="form-control" type="text" name="md_number" id="md_number" value="{{ old('md_number', '') }}">
                            @if($errors->has('md_number'))
                                <span class="help-block" role="alert">{{ $errors->first('md_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.md_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('director_name') ? 'has-error' : '' }}">
                            <label for="director_name">{{ trans('cruds.hm.fields.director_name') }}</label>
                            <input class="form-control" type="text" name="director_name" id="director_name" value="{{ old('director_name', '') }}">
                            @if($errors->has('director_name'))
                                <span class="help-block" role="alert">{{ $errors->first('director_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.director_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('director_number') ? 'has-error' : '' }}">
                            <label for="director_number">{{ trans('cruds.hm.fields.director_number') }}</label>
                            <input class="form-control" type="text" name="director_number" id="director_number" value="{{ old('director_number', '') }}">
                            @if($errors->has('director_number'))
                                <span class="help-block" role="alert">{{ $errors->first('director_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.director_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manager_name') ? 'has-error' : '' }}">
                            <label for="manager_name">{{ trans('cruds.hm.fields.manager_name') }}</label>
                            <input class="form-control" type="text" name="manager_name" id="manager_name" value="{{ old('manager_name', '') }}">
                            @if($errors->has('manager_name'))
                                <span class="help-block" role="alert">{{ $errors->first('manager_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.manager_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manager_number') ? 'has-error' : '' }}">
                            <label for="manager_number">{{ trans('cruds.hm.fields.manager_number') }}</label>
                            <input class="form-control" type="text" name="manager_number" id="manager_number" value="{{ old('manager_number', '') }}">
                            @if($errors->has('manager_number'))
                                <span class="help-block" role="alert">{{ $errors->first('manager_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.manager_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('am_name') ? 'has-error' : '' }}">
                            <label for="am_name">{{ trans('cruds.hm.fields.am_name') }}</label>
                            <input class="form-control" type="text" name="am_name" id="am_name" value="{{ old('am_name', '') }}">
                            @if($errors->has('am_name'))
                                <span class="help-block" role="alert">{{ $errors->first('am_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.am_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('am_number') ? 'has-error' : '' }}">
                            <label for="am_number">{{ trans('cruds.hm.fields.am_number') }}</label>
                            <input class="form-control" type="text" name="am_number" id="am_number" value="{{ old('am_number', '') }}">
                            @if($errors->has('am_number'))
                                <span class="help-block" role="alert">{{ $errors->first('am_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.am_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reception_all_numbers') ? 'has-error' : '' }}">
                            <label for="reception_all_numbers">{{ trans('cruds.hm.fields.reception_all_numbers') }}</label>
                            <textarea class="form-control ckeditor" name="reception_all_numbers" id="reception_all_numbers">{!! old('reception_all_numbers') !!}</textarea>
                            @if($errors->has('reception_all_numbers'))
                                <span class="help-block" role="alert">{{ $errors->first('reception_all_numbers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.reception_all_numbers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ultra_sonogram_assistant_name') ? 'has-error' : '' }}">
                            <label for="ultra_sonogram_assistant_name">{{ trans('cruds.hm.fields.ultra_sonogram_assistant_name') }}</label>
                            <input class="form-control" type="text" name="ultra_sonogram_assistant_name" id="ultra_sonogram_assistant_name" value="{{ old('ultra_sonogram_assistant_name', '') }}">
                            @if($errors->has('ultra_sonogram_assistant_name'))
                                <span class="help-block" role="alert">{{ $errors->first('ultra_sonogram_assistant_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.ultra_sonogram_assistant_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ultra_sonogram_assistant_number') ? 'has-error' : '' }}">
                            <label for="ultra_sonogram_assistant_number">{{ trans('cruds.hm.fields.ultra_sonogram_assistant_number') }}</label>
                            <input class="form-control" type="text" name="ultra_sonogram_assistant_number" id="ultra_sonogram_assistant_number" value="{{ old('ultra_sonogram_assistant_number', '') }}">
                            @if($errors->has('ultra_sonogram_assistant_number'))
                                <span class="help-block" role="alert">{{ $errors->first('ultra_sonogram_assistant_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.ultra_sonogram_assistant_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('medical_technologist_lab_name') ? 'has-error' : '' }}">
                            <label for="medical_technologist_lab_name">{{ trans('cruds.hm.fields.medical_technologist_lab_name') }}</label>
                            <input class="form-control" type="text" name="medical_technologist_lab_name" id="medical_technologist_lab_name" value="{{ old('medical_technologist_lab_name', '') }}">
                            @if($errors->has('medical_technologist_lab_name'))
                                <span class="help-block" role="alert">{{ $errors->first('medical_technologist_lab_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.medical_technologist_lab_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('medical_technologist_lab_number') ? 'has-error' : '' }}">
                            <label for="medical_technologist_lab_number">{{ trans('cruds.hm.fields.medical_technologist_lab_number') }}</label>
                            <input class="form-control" type="text" name="medical_technologist_lab_number" id="medical_technologist_lab_number" value="{{ old('medical_technologist_lab_number', '') }}">
                            @if($errors->has('medical_technologist_lab_number'))
                                <span class="help-block" role="alert">{{ $errors->first('medical_technologist_lab_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.medical_technologist_lab_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('medical_technologist_xray_name') ? 'has-error' : '' }}">
                            <label for="medical_technologist_xray_name">{{ trans('cruds.hm.fields.medical_technologist_xray_name') }}</label>
                            <input class="form-control" type="text" name="medical_technologist_xray_name" id="medical_technologist_xray_name" value="{{ old('medical_technologist_xray_name', '') }}">
                            @if($errors->has('medical_technologist_xray_name'))
                                <span class="help-block" role="alert">{{ $errors->first('medical_technologist_xray_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.medical_technologist_xray_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('medical_technologist_xray_number') ? 'has-error' : '' }}">
                            <label for="medical_technologist_xray_number">{{ trans('cruds.hm.fields.medical_technologist_xray_number') }}</label>
                            <input class="form-control" type="text" name="medical_technologist_xray_number" id="medical_technologist_xray_number" value="{{ old('medical_technologist_xray_number', '') }}">
                            @if($errors->has('medical_technologist_xray_number'))
                                <span class="help-block" role="alert">{{ $errors->first('medical_technologist_xray_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.medical_technologist_xray_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accounts_department_name') ? 'has-error' : '' }}">
                            <label for="accounts_department_name">{{ trans('cruds.hm.fields.accounts_department_name') }}</label>
                            <input class="form-control" type="text" name="accounts_department_name" id="accounts_department_name" value="{{ old('accounts_department_name', '') }}">
                            @if($errors->has('accounts_department_name'))
                                <span class="help-block" role="alert">{{ $errors->first('accounts_department_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.accounts_department_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accounts_department_number') ? 'has-error' : '' }}">
                            <label for="accounts_department_number">{{ trans('cruds.hm.fields.accounts_department_number') }}</label>
                            <input class="form-control" type="text" name="accounts_department_number" id="accounts_department_number" value="{{ old('accounts_department_number', '') }}">
                            @if($errors->has('accounts_department_number'))
                                <span class="help-block" role="alert">{{ $errors->first('accounts_department_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.accounts_department_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('receptionist_name') ? 'has-error' : '' }}">
                            <label for="receptionist_name">{{ trans('cruds.hm.fields.receptionist_name') }}</label>
                            <input class="form-control" type="text" name="receptionist_name" id="receptionist_name" value="{{ old('receptionist_name', '') }}">
                            @if($errors->has('receptionist_name'))
                                <span class="help-block" role="alert">{{ $errors->first('receptionist_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.receptionist_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('receptionist_number') ? 'has-error' : '' }}">
                            <label for="receptionist_number">{{ trans('cruds.hm.fields.receptionist_number') }}</label>
                            <input class="form-control" type="text" name="receptionist_number" id="receptionist_number" value="{{ old('receptionist_number', '') }}">
                            @if($errors->has('receptionist_number'))
                                <span class="help-block" role="alert">{{ $errors->first('receptionist_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.receptionist_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accountant_name') ? 'has-error' : '' }}">
                            <label for="accountant_name">{{ trans('cruds.hm.fields.accountant_name') }}</label>
                            <input class="form-control" type="text" name="accountant_name" id="accountant_name" value="{{ old('accountant_name', '') }}">
                            @if($errors->has('accountant_name'))
                                <span class="help-block" role="alert">{{ $errors->first('accountant_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.accountant_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accountant_number') ? 'has-error' : '' }}">
                            <label for="accountant_number">{{ trans('cruds.hm.fields.accountant_number') }}</label>
                            <input class="form-control" type="text" name="accountant_number" id="accountant_number" value="{{ old('accountant_number', '') }}">
                            @if($errors->has('accountant_number'))
                                <span class="help-block" role="alert">{{ $errors->first('accountant_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.accountant_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bill_send_mail') ? 'has-error' : '' }}">
                            <label class="required" for="bill_send_mail">{{ trans('cruds.hm.fields.bill_send_mail') }}</label>
                            <input class="form-control" type="email" name="bill_send_mail" id="bill_send_mail" value="{{ old('bill_send_mail') }}" required>
                            @if($errors->has('bill_send_mail'))
                                <span class="help-block" role="alert">{{ $errors->first('bill_send_mail') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.bill_send_mail_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('previous_company') ? 'has-error' : '' }}">
                            <label for="previous_company">{{ trans('cruds.hm.fields.previous_company') }}</label>
                            <input class="form-control" type="text" name="previous_company" id="previous_company" value="{{ old('previous_company', '') }}">
                            @if($errors->has('previous_company'))
                                <span class="help-block" role="alert">{{ $errors->first('previous_company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.previous_company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('it_person_name') ? 'has-error' : '' }}">
                            <label for="it_person_name">{{ trans('cruds.hm.fields.it_person_name') }}</label>
                            <input class="form-control" type="text" name="it_person_name" id="it_person_name" value="{{ old('it_person_name', '') }}">
                            @if($errors->has('it_person_name'))
                                <span class="help-block" role="alert">{{ $errors->first('it_person_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.it_person_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('it_person_number') ? 'has-error' : '' }}">
                            <label for="it_person_number">{{ trans('cruds.hm.fields.it_person_number') }}</label>
                            <input class="form-control" type="text" name="it_person_number" id="it_person_number" value="{{ old('it_person_number', '') }}">
                            @if($errors->has('it_person_number'))
                                <span class="help-block" role="alert">{{ $errors->first('it_person_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.it_person_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('installed_by') ? 'has-error' : '' }}">
                            <label for="installed_by">{{ trans('cruds.hm.fields.installed_by') }}</label>
                            <input class="form-control" type="text" name="installed_by" id="installed_by" value="{{ old('installed_by', '') }}">
                            @if($errors->has('installed_by'))
                                <span class="help-block" role="alert">{{ $errors->first('installed_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.installed_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('annual_maintenance_charge') ? 'has-error' : '' }}">
                            <label for="annual_maintenance_charge">{{ trans('cruds.hm.fields.annual_maintenance_charge') }}</label>
                            <input class="form-control" type="text" name="annual_maintenance_charge" id="annual_maintenance_charge" value="{{ old('annual_maintenance_charge', '') }}">
                            @if($errors->has('annual_maintenance_charge'))
                                <span class="help-block" role="alert">{{ $errors->first('annual_maintenance_charge') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.annual_maintenance_charge_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('connection_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.hm.fields.connection_status') }}</label>
                            <select class="form-control" name="connection_status" id="connection_status" required>
                                <option value disabled {{ old('connection_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Hm::CONNECTION_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('connection_status', 'Inactive') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('connection_status'))
                                <span class="help-block" role="alert">{{ $errors->first('connection_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.connection_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('conncetion_status_reason') ? 'has-error' : '' }}">
                            <label for="conncetion_status_reason">{{ trans('cruds.hm.fields.conncetion_status_reason') }}</label>
                            <input class="form-control" type="text" name="conncetion_status_reason" id="conncetion_status_reason" value="{{ old('conncetion_status_reason', '') }}">
                            @if($errors->has('conncetion_status_reason'))
                                <span class="help-block" role="alert">{{ $errors->first('conncetion_status_reason') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.conncetion_status_reason_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('agreement_attachment') ? 'has-error' : '' }}">
                            <label for="agreement_attachment">{{ trans('cruds.hm.fields.agreement_attachment') }}</label>
                            <div class="needsclick dropzone" id="agreement_attachment-dropzone">
                            </div>
                            @if($errors->has('agreement_attachment'))
                                <span class="help-block" role="alert">{{ $errors->first('agreement_attachment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.agreement_attachment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('connection_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.hm.fields.connection_type') }}</label>
                            <select class="form-control" name="connection_type" id="connection_type" required>
                                <option value disabled {{ old('connection_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Hm::CONNECTION_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('connection_type', 'Online') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('connection_type'))
                                <span class="help-block" role="alert">{{ $errors->first('connection_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hm.fields.connection_type_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.hms.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $hm->id ?? 0 }}');
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
    url: '{{ route('admin.hms.storeMedia') }}',
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
@if(isset($hm) && $hm->agreement_attachment)
          var files =
            {!! json_encode($hm->agreement_attachment) !!}
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