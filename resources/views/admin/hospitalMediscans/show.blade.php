@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hospitalMediscan.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-mediscans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.user_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->user_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.password') }}
                                    </th>
                                    <td>
                                        ********
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $hospitalMediscan->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.price_agreement_policy') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->price_agreement_policy->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.connection_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->connection_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.cr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->cr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.cr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->cr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.dr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->dr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.dr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->dr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mm_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->mm_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mm_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->mm_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.ct_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->ct_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.ct_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->ct_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mri_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->mri_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mri_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->mri_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.dropbox_mail_ip') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->dropbox_mail_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.dropbox_password') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->dropbox_password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.hospital_hr') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->hospital_hr->hopital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.profit_sharing_rate') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->profit_sharing_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.bill_mail') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->bill_mail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.management_software_propose') }}
                                    </th>
                                    <td>
                                        {!! $hospitalMediscan->management_software_propose !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.installed_by') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->installed_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mininum_charge') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->mininum_charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.annual_fee') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->annual_fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.others_company_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->others_company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.router_reinstallation_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->router_reinstallation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.connection_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMediscan::CONNECTION_STATUS_SELECT[$hospitalMediscan->connection_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.conncetion_status_reason') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->conncetion_status_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.agreement_attachment') }}
                                    </th>
                                    <td>
                                        @foreach($hospitalMediscan->agreement_attachment as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.machine_available_profile') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMediscan->machine_available_profile->hospital_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-mediscans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#hospital_name_radiologist_mediscans" aria-controls="hospital_name_radiologist_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.radiologistMediscan.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="hospital_name_radiologist_mediscans">
                        @includeIf('admin.hospitalMediscans.relationships.hospitalNameRadiologistMediscans', ['radiologistMediscans' => $hospitalMediscan->hospitalNameRadiologistMediscans])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection