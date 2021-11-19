@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.machineStatusProfile.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.machine-status-profiles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $machineStatusProfile->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $machineStatusProfile->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.ct_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::CT_CENTER_SELECT[$machineStatusProfile->ct_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.mri_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::MRI_CENTER_SELECT[$machineStatusProfile->mri_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.mammography_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::MAMMOGRAPHY_CENTER_SELECT[$machineStatusProfile->mammography_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.fpd_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::FPD_CENTER_SELECT[$machineStatusProfile->fpd_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.dr_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::DR_CENTER_SELECT[$machineStatusProfile->dr_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.cr_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::CR_CENTER_SELECT[$machineStatusProfile->cr_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.agfa_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::AGFA_CENTER_SELECT[$machineStatusProfile->agfa_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.konica_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::KONICA_CENTER_SELECT[$machineStatusProfile->konica_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.fier_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::FIER_CENTER_SELECT[$machineStatusProfile->fier_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.ecg_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::ECG_CENTER_SELECT[$machineStatusProfile->ecg_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.simence_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::SIMENCE_CENTER_SELECT[$machineStatusProfile->simence_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.gee_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::GEE_CENTER_SELECT[$machineStatusProfile->gee_center] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.machineStatusProfile.fields.philips_center') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MachineStatusProfile::PHILIPS_CENTER_SELECT[$machineStatusProfile->philips_center] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.machine-status-profiles.index') }}">
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
                        <a href="#machine_available_profile_hospital_mediscans" aria-controls="machine_available_profile_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#machine_available_profile_hospital_mentors" aria-controls="machine_available_profile_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#machine_available_profile_hospital_five_c_networks" aria-controls="machine_available_profile_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="machine_available_profile_hospital_mediscans">
                        @includeIf('admin.machineStatusProfiles.relationships.machineAvailableProfileHospitalMediscans', ['hospitalMediscans' => $machineStatusProfile->machineAvailableProfileHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="machine_available_profile_hospital_mentors">
                        @includeIf('admin.machineStatusProfiles.relationships.machineAvailableProfileHospitalMentors', ['hospitalMentors' => $machineStatusProfile->machineAvailableProfileHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="machine_available_profile_hospital_five_c_networks">
                        @includeIf('admin.machineStatusProfiles.relationships.machineAvailableProfileHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $machineStatusProfile->machineAvailableProfileHospitalFiveCNetworks])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection