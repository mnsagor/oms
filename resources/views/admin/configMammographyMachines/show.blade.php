@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.configMammographyMachine.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-mammography-machines.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->hospital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.machine_name') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->machine_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.ae_title') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->ae_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.port_number') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->port_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.main_ip') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->main_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.configured_ip') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->configured_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.host_name') }}
                                    </th>
                                    <td>
                                        {{ $configMammographyMachine->host_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.configMammographyMachine.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ConfigMammographyMachine::STATUS_SELECT[$configMammographyMachine->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.config-mammography-machines.index') }}">
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
                        <a href="#mm_configuration_hospital_mediscans" aria-controls="mm_configuration_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mm_configuration_hospital_mentors" aria-controls="mm_configuration_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mm_configuration_hospital_five_c_networks" aria-controls="mm_configuration_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#mm_configuration_visited_hospitals" aria-controls="mm_configuration_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="mm_configuration_hospital_mediscans">
                        @includeIf('admin.configMammographyMachines.relationships.mmConfigurationHospitalMediscans', ['hospitalMediscans' => $configMammographyMachine->mmConfigurationHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mm_configuration_hospital_mentors">
                        @includeIf('admin.configMammographyMachines.relationships.mmConfigurationHospitalMentors', ['hospitalMentors' => $configMammographyMachine->mmConfigurationHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mm_configuration_hospital_five_c_networks">
                        @includeIf('admin.configMammographyMachines.relationships.mmConfigurationHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $configMammographyMachine->mmConfigurationHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="mm_configuration_visited_hospitals">
                        @includeIf('admin.configMammographyMachines.relationships.mmConfigurationVisitedHospitals', ['visitedHospitals' => $configMammographyMachine->mmConfigurationVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection