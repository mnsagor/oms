@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.configMriMachine.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-mri-machines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.machine_name') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->machine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.ae_title') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->ae_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.main_ip') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->main_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.configured_ip') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->configured_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.host_name') }}
                                    </th>
                                    <td>
                                        {{ $configMriMachine->host_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMriMachine.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ConfigMriMachine::STATUS_SELECT[$configMriMachine->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-mri-machines.index') }}">
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
                        <a href="#mri_configuration_hospital_mediscans" aria-controls="mri_configuration_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mri_configuration_hospital_mentors" aria-controls="mri_configuration_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mri_configuration_hospital_five_c_networks" aria-controls="mri_configuration_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mri_configuration_visited_hospitals" aria-controls="mri_configuration_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="mri_configuration_hospital_mediscans">
                        @includeIf('admin.configMriMachines.relationships.mriConfigurationHospitalMediscans', ['hospitalMediscans' => $configMriMachine->mriConfigurationHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mri_configuration_hospital_mentors">
                        @includeIf('admin.configMriMachines.relationships.mriConfigurationHospitalMentors', ['hospitalMentors' => $configMriMachine->mriConfigurationHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mri_configuration_hospital_five_c_networks">
                        @includeIf('admin.configMriMachines.relationships.mriConfigurationHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $configMriMachine->mriConfigurationHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mri_configuration_visited_hospitals">
                        @includeIf('admin.configMriMachines.relationships.mriConfigurationVisitedHospitals', ['visitedHospitals' => $configMriMachine->mriConfigurationVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection