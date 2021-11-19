@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.configCrMachine.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-cr-machines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.machine_name') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->machine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.ae_title') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->ae_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.main_ip') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->main_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.configured_ip') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->configured_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.host_name') }}
                                    </th>
                                    <td>
                                        {{ $configCrMachine->host_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configCrMachine.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ConfigCrMachine::STATUS_SELECT[$configCrMachine->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-cr-machines.index') }}">
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
                        <a href="#cr_configuration_hospital_mediscans" aria-controls="cr_configuration_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cr_configuration_hospital_mentors" aria-controls="cr_configuration_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cr_configuration_hospital_five_c_networks" aria-controls="cr_configuration_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#cr_configuration_visited_hospitals" aria-controls="cr_configuration_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="cr_configuration_hospital_mediscans">
                        @includeIf('admin.configCrMachines.relationships.crConfigurationHospitalMediscans', ['hospitalMediscans' => $configCrMachine->crConfigurationHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="cr_configuration_hospital_mentors">
                        @includeIf('admin.configCrMachines.relationships.crConfigurationHospitalMentors', ['hospitalMentors' => $configCrMachine->crConfigurationHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="cr_configuration_hospital_five_c_networks">
                        @includeIf('admin.configCrMachines.relationships.crConfigurationHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $configCrMachine->crConfigurationHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="cr_configuration_visited_hospitals">
                        @includeIf('admin.configCrMachines.relationships.crConfigurationVisitedHospitals', ['visitedHospitals' => $configCrMachine->crConfigurationVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection