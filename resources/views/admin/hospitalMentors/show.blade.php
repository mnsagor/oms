@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hospitalMentor.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-mentors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.user_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->user_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.password') }}
                                    </th>
                                    <td>
                                        ********
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $hospitalMentor->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.price_agreement_policy') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->price_agreement_policy->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.connection_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->connection_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.cr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->cr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.cr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->cr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.dr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->dr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.dr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->dr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.mm_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->mm_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.mm_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->mm_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.ct_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->ct_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.ct_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->ct_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.mri_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->mri_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.mri_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->mri_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.dropbox_mail_ip') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->dropbox_mail_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.dropbox_password') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->dropbox_password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.hospital_hr') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->hospital_hr->hopital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.profit_sharing_rate') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->profit_sharing_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.bill_mail') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->bill_mail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.management_software_propose') }}
                                    </th>
                                    <td>
                                        {!! $hospitalMentor->management_software_propose !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.installed_by') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->installed_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.mininum_charge') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->mininum_charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.annual_fee') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->annual_fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.others_company_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->others_company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.router_reinstallation_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->router_reinstallation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.connection_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalMentor::CONNECTION_STATUS_SELECT[$hospitalMentor->connection_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.conncetion_status_reason') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->conncetion_status_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.agreement_attachment') }}
                                    </th>
                                    <td>
                                        @foreach($hospitalMentor->agreement_attachment as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalMentor.fields.machine_available_profile') }}
                                    </th>
                                    <td>
                                        {{ $hospitalMentor->machine_available_profile->hospital_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-mentors.index') }}">
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
                        <a href="#hospital_name_radiologist_mentors" aria-controls="hospital_name_radiologist_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.radiologistMentor.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="hospital_name_radiologist_mentors">
                        @includeIf('admin.hospitalMentors.relationships.hospitalNameRadiologistMentors', ['radiologistMentors' => $hospitalMentor->hospitalNameRadiologistMentors])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection