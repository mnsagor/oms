@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.configCtMachine.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-ct-machines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.machine_name') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->machine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.ae_title') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->ae_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.main_ip') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->main_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.configured_ip') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->configured_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.host_name') }}
                                    </th>
                                    <td>
                                        {{ $configCtMachine->host_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCtMachine.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ConfigCtMachine::STATUS_SELECT[$configCtMachine->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-ct-machines.index') }}">
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
                        <a href="#ct_configuration_hospital_mediscans" aria-controls="ct_configuration_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ct_configuration_hospital_mentors" aria-controls="ct_configuration_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ct_configuration_hospital_five_c_networks" aria-controls="ct_configuration_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ct_configuration_visited_hospitals" aria-controls="ct_configuration_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="ct_configuration_hospital_mediscans">
                        @includeIf('admin.configCtMachines.relationships.ctConfigurationHospitalMediscans', ['hospitalMediscans' => $configCtMachine->ctConfigurationHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="ct_configuration_hospital_mentors">
                        @includeIf('admin.configCtMachines.relationships.ctConfigurationHospitalMentors', ['hospitalMentors' => $configCtMachine->ctConfigurationHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="ct_configuration_hospital_five_c_networks">
                        @includeIf('admin.configCtMachines.relationships.ctConfigurationHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $configCtMachine->ctConfigurationHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="ct_configuration_visited_hospitals">
                        @includeIf('admin.configCtMachines.relationships.ctConfigurationVisitedHospitals', ['visitedHospitals' => $configCtMachine->ctConfigurationVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection