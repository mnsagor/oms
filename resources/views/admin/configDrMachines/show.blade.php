@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.configDrMachine.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-dr-machines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.machine_name') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->machine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.ae_title') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->ae_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.main_ip') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->main_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.configured_ip') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->configured_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.host_name') }}
                                    </th>
                                    <td>
                                        {{ $configDrMachine->host_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configDrMachine.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ConfigDrMachine::STATUS_SELECT[$configDrMachine->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-dr-machines.index') }}">
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
                        <a href="#dr_configuration_hospital_mediscans" aria-controls="dr_configuration_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#dr_configuration_hospital_mentors" aria-controls="dr_configuration_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#dr_configuration_hospital_five_c_networks" aria-controls="dr_configuration_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#dr_configuration_visited_hospitals" aria-controls="dr_configuration_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="dr_configuration_hospital_mediscans">
                        @includeIf('admin.configDrMachines.relationships.drConfigurationHospitalMediscans', ['hospitalMediscans' => $configDrMachine->drConfigurationHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="dr_configuration_hospital_mentors">
                        @includeIf('admin.configDrMachines.relationships.drConfigurationHospitalMentors', ['hospitalMentors' => $configDrMachine->drConfigurationHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="dr_configuration_hospital_five_c_networks">
                        @includeIf('admin.configDrMachines.relationships.drConfigurationHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $configDrMachine->drConfigurationHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="dr_configuration_visited_hospitals">
                        @includeIf('admin.configDrMachines.relationships.drConfigurationVisitedHospitals', ['visitedHospitals' => $configDrMachine->drConfigurationVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection