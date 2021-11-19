@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.radiologistMentor.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-mentors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->degree }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $radiologistMentor->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.joining_date') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->joining_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->hospital_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.reporting_price') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->reporting_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMentor->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RadiologistMentor::STATUS_SELECT[$radiologistMentor->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($radiologistMentor->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-mentors.index') }}">
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