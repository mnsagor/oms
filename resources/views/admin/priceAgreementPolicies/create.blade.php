@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.priceAgreementPolicy.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.price-agreement-policies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.priceAgreementPolicy.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('xray') ? 'has-error' : '' }}">
                            <label for="xray">{{ trans('cruds.priceAgreementPolicy.fields.xray') }}</label>
                            <input class="form-control" type="text" name="xray" id="xray" value="{{ old('xray', '') }}">
                            @if($errors->has('xray'))
                                <span class="help-block" role="alert">{{ $errors->first('xray') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.xray_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('xray_single') ? 'has-error' : '' }}">
                            <label for="xray_single">{{ trans('cruds.priceAgreementPolicy.fields.xray_single') }}</label>
                            <input class="form-control" type="text" name="xray_single" id="xray_single" value="{{ old('xray_single', '') }}">
                            @if($errors->has('xray_single'))
                                <span class="help-block" role="alert">{{ $errors->first('xray_single') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.xray_single_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('xray_both') ? 'has-error' : '' }}">
                            <label for="xray_both">{{ trans('cruds.priceAgreementPolicy.fields.xray_both') }}</label>
                            <input class="form-control" type="text" name="xray_both" id="xray_both" value="{{ old('xray_both', '') }}">
                            @if($errors->has('xray_both'))
                                <span class="help-block" role="alert">{{ $errors->first('xray_both') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.xray_both_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('xray_contrast') ? 'has-error' : '' }}">
                            <label for="xray_contrast">{{ trans('cruds.priceAgreementPolicy.fields.xray_contrast') }}</label>
                            <input class="form-control" type="text" name="xray_contrast" id="xray_contrast" value="{{ old('xray_contrast', '') }}">
                            @if($errors->has('xray_contrast'))
                                <span class="help-block" role="alert">{{ $errors->first('xray_contrast') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.xray_contrast_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct') ? 'has-error' : '' }}">
                            <label for="ct">{{ trans('cruds.priceAgreementPolicy.fields.ct') }}</label>
                            <input class="form-control" type="text" name="ct" id="ct" value="{{ old('ct', '') }}">
                            @if($errors->has('ct'))
                                <span class="help-block" role="alert">{{ $errors->first('ct') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.ct_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_brain') ? 'has-error' : '' }}">
                            <label for="ct_brain">{{ trans('cruds.priceAgreementPolicy.fields.ct_brain') }}</label>
                            <input class="form-control" type="text" name="ct_brain" id="ct_brain" value="{{ old('ct_brain', '') }}">
                            @if($errors->has('ct_brain'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_brain') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.ct_brain_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_chest') ? 'has-error' : '' }}">
                            <label for="ct_chest">{{ trans('cruds.priceAgreementPolicy.fields.ct_chest') }}</label>
                            <input class="form-control" type="text" name="ct_chest" id="ct_chest" value="{{ old('ct_chest', '') }}">
                            @if($errors->has('ct_chest'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_chest') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.ct_chest_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_other') ? 'has-error' : '' }}">
                            <label for="ct_other">{{ trans('cruds.priceAgreementPolicy.fields.ct_other') }}</label>
                            <input class="form-control" type="text" name="ct_other" id="ct_other" value="{{ old('ct_other', '') }}">
                            @if($errors->has('ct_other'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_other') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.ct_other_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('whole_abdomen') ? 'has-error' : '' }}">
                            <label for="whole_abdomen">{{ trans('cruds.priceAgreementPolicy.fields.whole_abdomen') }}</label>
                            <input class="form-control" type="text" name="whole_abdomen" id="whole_abdomen" value="{{ old('whole_abdomen', '') }}">
                            @if($errors->has('whole_abdomen'))
                                <span class="help-block" role="alert">{{ $errors->first('whole_abdomen') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.whole_abdomen_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('urogram') ? 'has-error' : '' }}">
                            <label for="urogram">{{ trans('cruds.priceAgreementPolicy.fields.urogram') }}</label>
                            <input class="form-control" type="text" name="urogram" id="urogram" value="{{ old('urogram', '') }}">
                            @if($errors->has('urogram'))
                                <span class="help-block" role="alert">{{ $errors->first('urogram') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.urogram_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri') ? 'has-error' : '' }}">
                            <label for="mri">{{ trans('cruds.priceAgreementPolicy.fields.mri') }}</label>
                            <input class="form-control" type="text" name="mri" id="mri" value="{{ old('mri', '') }}">
                            @if($errors->has('mri'))
                                <span class="help-block" role="alert">{{ $errors->first('mri') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.mri_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_brain') ? 'has-error' : '' }}">
                            <label for="mri_brain">{{ trans('cruds.priceAgreementPolicy.fields.mri_brain') }}</label>
                            <input class="form-control" type="text" name="mri_brain" id="mri_brain" value="{{ old('mri_brain', '') }}">
                            @if($errors->has('mri_brain'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_brain') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.mri_brain_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_spine') ? 'has-error' : '' }}">
                            <label for="mri_spine">{{ trans('cruds.priceAgreementPolicy.fields.mri_spine') }}</label>
                            <input class="form-control" type="text" name="mri_spine" id="mri_spine" value="{{ old('mri_spine', '') }}">
                            @if($errors->has('mri_spine'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_spine') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.mri_spine_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_other') ? 'has-error' : '' }}">
                            <label for="mri_other">{{ trans('cruds.priceAgreementPolicy.fields.mri_other') }}</label>
                            <input class="form-control" type="text" name="mri_other" id="mri_other" value="{{ old('mri_other', '') }}">
                            @if($errors->has('mri_other'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_other') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceAgreementPolicy.fields.mri_other_helper') }}</span>
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