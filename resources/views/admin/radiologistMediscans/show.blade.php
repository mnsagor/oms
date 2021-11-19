@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.radiologistMediscan.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-mediscans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->degree }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $radiologistMediscan->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.joining_date') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->joining_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->hospital_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.reporting_price') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->reporting_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $radiologistMediscan->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RadiologistMediscan::STATUS_SELECT[$radiologistMediscan->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistMediscan.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($radiologistMediscan->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-mediscans.index') }}">
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