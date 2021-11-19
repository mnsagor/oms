@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.visitedHospital.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.visited-hospitals.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\VisitedHospital::STATUS_SELECT[$visitedHospital->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $visitedHospital->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.is_online') }}
                                    </th>
                                    <td>
                                        {{ App\Models\VisitedHospital::IS_ONLINE_SELECT[$visitedHospital->is_online] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.visited_date') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->visited_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.visited_by') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->visited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.other_company_name') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->other_company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.other_company_price') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->other_company_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.cr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->cr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.dr_configuration') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->dr_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.ct_configuration') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->ct_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.mri_configuration') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->mri_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.mm_configuration') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->mm_configuration->hospital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.hospital_hr') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->hospital_hr->hopital_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.dealing_tech') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->dealing_tech }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.dealing_tech_number') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->dealing_tech_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.bill_send_email') }}
                                    </th>
                                    <td>
                                        {{ $visitedHospital->bill_send_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.management_software_propose') }}
                                    </th>
                                    <td>
                                        {!! $visitedHospital->management_software_propose !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($visitedHospital->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.comments') }}
                                    </th>
                                    <td>
                                        {!! $visitedHospital->comments !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.visited-hospitals.index') }}">
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