@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.hospitalHr.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.hospital-hrs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('hopital_name') ? 'has-error' : '' }}">
                            <label class="required" for="hopital_name">{{ trans('cruds.hospitalHr.fields.hopital_name') }}</label>
                            <input class="form-control" type="text" name="hopital_name" id="hopital_name" value="{{ old('hopital_name', 'HR For XXX Hospital') }}" required>
                            @if($errors->has('hopital_name'))
                                <span class="help-block" role="alert">{{ $errors->first('hopital_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.hopital_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chairman_name') ? 'has-error' : '' }}">
                            <label for="chairman_name">{{ trans('cruds.hospitalHr.fields.chairman_name') }}</label>
                            <input class="form-control" type="text" name="chairman_name" id="chairman_name" value="{{ old('chairman_name', '') }}">
                            @if($errors->has('chairman_name'))
                                <span class="help-block" role="alert">{{ $errors->first('chairman_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.chairman_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('chairman_number') ? 'has-error' : '' }}">
                            <label for="chairman_number">{{ trans('cruds.hospitalHr.fields.chairman_number') }}</label>
                            <input class="form-control" type="text" name="chairman_number" id="chairman_number" value="{{ old('chairman_number', '') }}">
                            @if($errors->has('chairman_number'))
                                <span class="help-block" role="alert">{{ $errors->first('chairman_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.chairman_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('md_name') ? 'has-error' : '' }}">
                            <label for="md_name">{{ trans('cruds.hospitalHr.fields.md_name') }}</label>
                            <input class="form-control" type="text" name="md_name" id="md_name" value="{{ old('md_name', '') }}">
                            @if($errors->has('md_name'))
                                <span class="help-block" role="alert">{{ $errors->first('md_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.md_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('md_number') ? 'has-error' : '' }}">
                            <label for="md_number">{{ trans('cruds.hospitalHr.fields.md_number') }}</label>
                            <input class="form-control" type="text" name="md_number" id="md_number" value="{{ old('md_number', '') }}">
                            @if($errors->has('md_number'))
                                <span class="help-block" role="alert">{{ $errors->first('md_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.md_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('director_name') ? 'has-error' : '' }}">
                            <label for="director_name">{{ trans('cruds.hospitalHr.fields.director_name') }}</label>
                            <input class="form-control" type="text" name="director_name" id="director_name" value="{{ old('director_name', '') }}">
                            @if($errors->has('director_name'))
                                <span class="help-block" role="alert">{{ $errors->first('director_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.director_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('director_number') ? 'has-error' : '' }}">
                            <label for="director_number">{{ trans('cruds.hospitalHr.fields.director_number') }}</label>
                            <input class="form-control" type="text" name="director_number" id="director_number" value="{{ old('director_number', '') }}">
                            @if($errors->has('director_number'))
                                <span class="help-block" role="alert">{{ $errors->first('director_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.director_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manager_name') ? 'has-error' : '' }}">
                            <label for="manager_name">{{ trans('cruds.hospitalHr.fields.manager_name') }}</label>
                            <input class="form-control" type="text" name="manager_name" id="manager_name" value="{{ old('manager_name', '') }}">
                            @if($errors->has('manager_name'))
                                <span class="help-block" role="alert">{{ $errors->first('manager_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.manager_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('manager_number') ? 'has-error' : '' }}">
                            <label for="manager_number">{{ trans('cruds.hospitalHr.fields.manager_number') }}</label>
                            <input class="form-control" type="text" name="manager_number" id="manager_number" value="{{ old('manager_number', '') }}">
                            @if($errors->has('manager_number'))
                                <span class="help-block" role="alert">{{ $errors->first('manager_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.manager_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('am_name') ? 'has-error' : '' }}">
                            <label for="am_name">{{ trans('cruds.hospitalHr.fields.am_name') }}</label>
                            <input class="form-control" type="text" name="am_name" id="am_name" value="{{ old('am_name', '') }}">
                            @if($errors->has('am_name'))
                                <span class="help-block" role="alert">{{ $errors->first('am_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.am_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('am_number') ? 'has-error' : '' }}">
                            <label for="am_number">{{ trans('cruds.hospitalHr.fields.am_number') }}</label>
                            <input class="form-control" type="text" name="am_number" id="am_number" value="{{ old('am_number', '') }}">
                            @if($errors->has('am_number'))
                                <span class="help-block" role="alert">{{ $errors->first('am_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.am_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reception_details') ? 'has-error' : '' }}">
                            <label for="reception_details">{{ trans('cruds.hospitalHr.fields.reception_details') }}</label>
                            <textarea class="form-control ckeditor" name="reception_details" id="reception_details">{!! old('reception_details') !!}</textarea>
                            @if($errors->has('reception_details'))
                                <span class="help-block" role="alert">{{ $errors->first('reception_details') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.reception_details_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accountant_name') ? 'has-error' : '' }}">
                            <label for="accountant_name">{{ trans('cruds.hospitalHr.fields.accountant_name') }}</label>
                            <input class="form-control" type="text" name="accountant_name" id="accountant_name" value="{{ old('accountant_name', '') }}">
                            @if($errors->has('accountant_name'))
                                <span class="help-block" role="alert">{{ $errors->first('accountant_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.accountant_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accountant_number') ? 'has-error' : '' }}">
                            <label for="accountant_number">{{ trans('cruds.hospitalHr.fields.accountant_number') }}</label>
                            <input class="form-control" type="text" name="accountant_number" id="accountant_number" value="{{ old('accountant_number', '') }}">
                            @if($errors->has('accountant_number'))
                                <span class="help-block" role="alert">{{ $errors->first('accountant_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.accountant_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_name_1') ? 'has-error' : '' }}">
                            <label for="mt_name_1">{{ trans('cruds.hospitalHr.fields.mt_name_1') }}</label>
                            <input class="form-control" type="text" name="mt_name_1" id="mt_name_1" value="{{ old('mt_name_1', '') }}">
                            @if($errors->has('mt_name_1'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_name_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_name_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_number_1') ? 'has-error' : '' }}">
                            <label for="mt_number_1">{{ trans('cruds.hospitalHr.fields.mt_number_1') }}</label>
                            <input class="form-control" type="text" name="mt_number_1" id="mt_number_1" value="{{ old('mt_number_1', '') }}">
                            @if($errors->has('mt_number_1'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_number_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_number_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_name_2') ? 'has-error' : '' }}">
                            <label for="mt_name_2">{{ trans('cruds.hospitalHr.fields.mt_name_2') }}</label>
                            <input class="form-control" type="text" name="mt_name_2" id="mt_name_2" value="{{ old('mt_name_2', '') }}">
                            @if($errors->has('mt_name_2'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_name_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_name_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_number_2') ? 'has-error' : '' }}">
                            <label for="mt_number_2">{{ trans('cruds.hospitalHr.fields.mt_number_2') }}</label>
                            <input class="form-control" type="text" name="mt_number_2" id="mt_number_2" value="{{ old('mt_number_2', '') }}">
                            @if($errors->has('mt_number_2'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_number_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_number_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_name_3') ? 'has-error' : '' }}">
                            <label for="mt_name_3">{{ trans('cruds.hospitalHr.fields.mt_name_3') }}</label>
                            <input class="form-control" type="text" name="mt_name_3" id="mt_name_3" value="{{ old('mt_name_3', '') }}">
                            @if($errors->has('mt_name_3'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_name_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_name_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_number_3') ? 'has-error' : '' }}">
                            <label for="mt_number_3">{{ trans('cruds.hospitalHr.fields.mt_number_3') }}</label>
                            <input class="form-control" type="text" name="mt_number_3" id="mt_number_3" value="{{ old('mt_number_3', '') }}">
                            @if($errors->has('mt_number_3'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_number_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_number_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_name_4') ? 'has-error' : '' }}">
                            <label for="mt_name_4">{{ trans('cruds.hospitalHr.fields.mt_name_4') }}</label>
                            <input class="form-control" type="text" name="mt_name_4" id="mt_name_4" value="{{ old('mt_name_4', '') }}">
                            @if($errors->has('mt_name_4'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_name_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_name_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_number_4') ? 'has-error' : '' }}">
                            <label for="mt_number_4">{{ trans('cruds.hospitalHr.fields.mt_number_4') }}</label>
                            <input class="form-control" type="text" name="mt_number_4" id="mt_number_4" value="{{ old('mt_number_4', '') }}">
                            @if($errors->has('mt_number_4'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_number_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_number_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_name_5') ? 'has-error' : '' }}">
                            <label for="mt_name_5">{{ trans('cruds.hospitalHr.fields.mt_name_5') }}</label>
                            <input class="form-control" type="text" name="mt_name_5" id="mt_name_5" value="{{ old('mt_name_5', '') }}">
                            @if($errors->has('mt_name_5'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_name_5') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_name_5_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mt_number_5') ? 'has-error' : '' }}">
                            <label for="mt_number_5">{{ trans('cruds.hospitalHr.fields.mt_number_5') }}</label>
                            <input class="form-control" type="text" name="mt_number_5" id="mt_number_5" value="{{ old('mt_number_5', '') }}">
                            @if($errors->has('mt_number_5'))
                                <span class="help-block" role="alert">{{ $errors->first('mt_number_5') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.mt_number_5_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_eng_name') ? 'has-error' : '' }}">
                            <label for="ct_eng_name">{{ trans('cruds.hospitalHr.fields.ct_eng_name') }}</label>
                            <input class="form-control" type="text" name="ct_eng_name" id="ct_eng_name" value="{{ old('ct_eng_name', '') }}">
                            @if($errors->has('ct_eng_name'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_eng_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.ct_eng_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_eng_number') ? 'has-error' : '' }}">
                            <label for="ct_eng_number">{{ trans('cruds.hospitalHr.fields.ct_eng_number') }}</label>
                            <input class="form-control" type="text" name="ct_eng_number" id="ct_eng_number" value="{{ old('ct_eng_number', '') }}">
                            @if($errors->has('ct_eng_number'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_eng_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.ct_eng_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('it_person_name') ? 'has-error' : '' }}">
                            <label for="it_person_name">{{ trans('cruds.hospitalHr.fields.it_person_name') }}</label>
                            <input class="form-control" type="text" name="it_person_name" id="it_person_name" value="{{ old('it_person_name', '') }}">
                            @if($errors->has('it_person_name'))
                                <span class="help-block" role="alert">{{ $errors->first('it_person_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.it_person_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('it_person_number') ? 'has-error' : '' }}">
                            <label for="it_person_number">{{ trans('cruds.hospitalHr.fields.it_person_number') }}</label>
                            <input class="form-control" type="text" name="it_person_number" id="it_person_number" value="{{ old('it_person_number', '') }}">
                            @if($errors->has('it_person_number'))
                                <span class="help-block" role="alert">{{ $errors->first('it_person_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hospitalHr.fields.it_person_number_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.hospital-hrs.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $hospitalHr->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection