@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.procedure.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.procedures.update", [$procedure->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.procedure.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $procedure->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedure.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.procedure.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Procedure::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $procedure->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedure.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modality_name') ? 'has-error' : '' }}">
                            <label class="required" for="modality_name_id">{{ trans('cruds.procedure.fields.modality_name') }}</label>
                            <select class="form-control select2" name="modality_name_id" id="modality_name_id" required>
                                @foreach($modality_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('modality_name_id') ? old('modality_name_id') : $procedure->modality_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('modality_name'))
                                <span class="help-block" role="alert">{{ $errors->first('modality_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedure.fields.modality_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('procedure_type') ? 'has-error' : '' }}">
                            <label class="required" for="procedure_type_id">{{ trans('cruds.procedure.fields.procedure_type') }}</label>
                            <select class="form-control select2" name="procedure_type_id" id="procedure_type_id" required>
                                @foreach($procedure_types as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('procedure_type_id') ? old('procedure_type_id') : $procedure->procedure_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('procedure_type'))
                                <span class="help-block" role="alert">{{ $errors->first('procedure_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedure.fields.procedure_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection