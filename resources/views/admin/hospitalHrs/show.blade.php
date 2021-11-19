@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hospitalHr.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-hrs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.hopital_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->hopital_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.chairman_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->chairman_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.chairman_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->chairman_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.md_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->md_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.md_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->md_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.director_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->director_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.director_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->director_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.manager_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->manager_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.manager_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->manager_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.am_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->am_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.am_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->am_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.reception_details') }}
                                    </th>
                                    <td>
                                        {!! $hospitalHr->reception_details !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.accountant_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->accountant_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.accountant_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->accountant_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_name_1') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_name_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_number_1') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_number_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_name_2') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_name_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_number_2') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_number_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_name_3') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_name_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_number_3') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_number_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_name_4') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_name_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_number_4') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_number_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_name_5') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_name_5 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.mt_number_5') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->mt_number_5 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.ct_eng_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->ct_eng_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.ct_eng_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->ct_eng_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.it_person_name') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->it_person_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hospitalHr.fields.it_person_number') }}
                                    </th>
                                    <td>
                                        {{ $hospitalHr->it_person_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hospital-hrs.index') }}">
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
                        <a href="#hospital_hr_hospital_mediscans" aria-controls="hospital_hr_hospital_mediscans" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMediscan.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#hospital_hr_hospital_mentors" aria-controls="hospital_hr_hospital_mentors" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalMentor.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#hospital_hr_hospital_five_c_networks" aria-controls="hospital_hr_hospital_five_c_networks" role="tab" data-toggle="tab">
                            {{ trans('cruds.hospitalFiveCNetwork.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#hospital_hr_visited_hospitals" aria-controls="hospital_hr_visited_hospitals" role="tab" data-toggle="tab">
                            {{ trans('cruds.visitedHospital.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="hospital_hr_hospital_mediscans">
                        @includeIf('admin.hospitalHrs.relationships.hospitalHrHospitalMediscans', ['hospitalMediscans' => $hospitalHr->hospitalHrHospitalMediscans])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="hospital_hr_hospital_mentors">
                        @includeIf('admin.hospitalHrs.relationships.hospitalHrHospitalMentors', ['hospitalMentors' => $hospitalHr->hospitalHrHospitalMentors])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="hospital_hr_hospital_five_c_networks">
                        @includeIf('admin.hospitalHrs.relationships.hospitalHrHospitalFiveCNetworks', ['hospitalFiveCNetworks' => $hospitalHr->hospitalHrHospitalFiveCNetworks])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="hospital_hr_visited_hospitals">
                        @includeIf('admin.hospitalHrs.relationships.hospitalHrVisitedHospitals', ['visitedHospitals' => $hospitalHr->hospitalHrVisitedHospitals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection