@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.radiologistFiveC.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-five-cs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->degree }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $radiologistFiveC->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.joining_date') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->joining_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.hospital_name') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->hospital_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.reporting_price') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->reporting_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $radiologistFiveC->payment_method }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\RadiologistFiveC::STATUS_SELECT[$radiologistFiveC->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.radiologistFiveC.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($radiologistFiveC->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.radiologist-five-cs.index') }}">
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