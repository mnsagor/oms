@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hm.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hm->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $hm->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.username') }}
                                    </th>
                                    <td>
                                        {{ $hm->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.password') }}
                                    </th>
                                    <td>
                                        ********
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $hm->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $hm->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.connection_date') }}
                                    </th>
                                    <td>
                                        {{ $hm->connection_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.network_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->network_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.pathology_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->pathology_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.reception_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->reception_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.xray_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->xray_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.ultrasonography_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->ultrasonography_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.admin_ip') }}
                                    </th>
                                    <td>
                                        {{ $hm->admin_ip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.chairman_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->chairman_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.chairman_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->chairman_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.md_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->md_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.md_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->md_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.director_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->director_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.director_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->director_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.manager_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->manager_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.manager_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->manager_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.am_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->am_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.am_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->am_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.reception_all_numbers') }}
                                    </th>
                                    <td>
                                        {!! $hm->reception_all_numbers !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.ultra_sonogram_assistant_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->ultra_sonogram_assistant_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.ultra_sonogram_assistant_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->ultra_sonogram_assistant_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.medical_technologist_lab_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->medical_technologist_lab_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.medical_technologist_lab_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->medical_technologist_lab_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.medical_technologist_xray_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->medical_technologist_xray_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.medical_technologist_xray_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->medical_technologist_xray_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.accounts_department_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->accounts_department_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.accounts_department_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->accounts_department_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.receptionist_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->receptionist_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.receptionist_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->receptionist_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.accountant_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->accountant_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.accountant_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->accountant_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.bill_send_mail') }}
                                    </th>
                                    <td>
                                        {{ $hm->bill_send_mail }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.previous_company') }}
                                    </th>
                                    <td>
                                        {{ $hm->previous_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.it_person_name') }}
                                    </th>
                                    <td>
                                        {{ $hm->it_person_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.it_person_number') }}
                                    </th>
                                    <td>
                                        {{ $hm->it_person_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.installed_by') }}
                                    </th>
                                    <td>
                                        {{ $hm->installed_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.annual_maintenance_charge') }}
                                    </th>
                                    <td>
                                        {{ $hm->annual_maintenance_charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.connection_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Hm::CONNECTION_STATUS_SELECT[$hm->connection_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.conncetion_status_reason') }}
                                    </th>
                                    <td>
                                        {{ $hm->conncetion_status_reason }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.agreement_attachment') }}
                                    </th>
                                    <td>
                                        @foreach($hm->agreement_attachment as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hm.fields.connection_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Hm::CONNECTION_TYPE_SELECT[$hm->connection_type] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection