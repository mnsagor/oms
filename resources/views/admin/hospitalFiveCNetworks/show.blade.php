@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hospitalFiveCNetwork.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-five-c-networks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.user_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->user_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.password') }}
                                    </th>
                                    <td>
                                        ********
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $hospitalFiveCNetwork->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.price_agreement_policy') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->price_agreement_policy->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.connection_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->connection_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.cr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->cr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.cr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->cr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.dr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->dr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.dr_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->dr_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mm_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->mm_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mm_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->mm_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.ct_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->ct_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.ct_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->ct_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mri_configuration') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->mri_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mri_router_license_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->mri_router_license_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_mail_ip') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->dropbox_mail_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.dropbox_password') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->dropbox_password }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.hospital_hr') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->hospital_hr->hopital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.profit_sharing_rate') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->profit_sharing_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.bill_mail') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->bill_mail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.management_software_propose') }}
                                    </th>
                                    <td>
                                        {!! $hospitalFiveCNetwork->management_software_propose !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.installed_by') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->installed_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mininum_charge') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->mininum_charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.annual_fee') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->annual_fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.others_company_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->others_company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.router_reinstallation_date') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->router_reinstallation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.connection_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\HospitalFiveCNetwork::CONNECTION_STATUS_SELECT[$hospitalFiveCNetwork->connection_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.conncetion_status_reason') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->conncetion_status_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.agreement_attachment') }}
                                    </th>
                                    <td>
                                        @foreach($hospitalFiveCNetwork->agreement_attachment as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.machine_available_profile') }}
                                    </th>
                                    <td>
                                        {{ $hospitalFiveCNetwork->machine_available_profile->hospital_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-five-c-networks.index') }}">
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
                        <a href="#hospital_name_radiologist_five_cs" aria-controls="hospital_name_radiologist_five_cs" role="tab" data-toggle="tab">
                            {{ trans('cruds.radiologistFiveC.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="hospital_name_radiologist_five_cs">
                        @includeIf('admin.hospitalFiveCNetworks.relationships.hospitalNameRadiologistFiveCs', ['radiologistFiveCs' => $hospitalFiveCNetwork->hospitalNameRadiologistFiveCs])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection