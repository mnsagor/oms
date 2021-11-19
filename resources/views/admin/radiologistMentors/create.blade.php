@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.radiologistMentor.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.radiologist-mentors.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.radiologistMentor.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('degree') ? 'has-error' : '' }}">
                            <label for="degree">{{ trans('cruds.radiologistMentor.fields.degree') }}</label>
                            <input class="form-control" type="text" name="degree" id="degree" value="{{ old('degree', '') }}">
                            @if($errors->has('degree'))
                                <span class="help-block" role="alert">{{ $errors->first('degree') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.degree_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.radiologistMentor.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address') !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label class="required" for="phone_number">{{ trans('cruds.radiologistMentor.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                            @if($errors->has('phone_number'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.radiologistMentor.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">
                            <label for="joining_date">{{ trans('cruds.radiologistMentor.fields.joining_date') }}</label>
                            <input class="form-control date" type="text" name="joining_date" id="joining_date" value="{{ old('joining_date') }}">
                            @if($errors->has('joining_date'))
                                <span class="help-block" role="alert">{{ $errors->first('joining_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.joining_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospital_name') ? 'has-error' : '' }}">
                            <label for="hospital_name_id">{{ trans('cruds.radiologistMentor.fields.hospital_name') }}</label>
                            <select class="form-control select2" name="hospital_name_id" id="hospital_name_id">
                                @foreach($hospital_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('hospital_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hospital_name'))
                                <span class="help-block" role="alert">{{ $errors->first('hospital_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.hospital_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reporting_price') ? 'has-error' : '' }}">
                            <label class="required" for="reporting_price">{{ trans('cruds.radiologistMentor.fields.reporting_price') }}</label>
                            <input class="form-control" type="text" name="reporting_price" id="reporting_price" value="{{ old('reporting_price', '') }}" required>
                            @if($errors->has('reporting_price'))
                                <span class="help-block" role="alert">{{ $errors->first('reporting_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.reporting_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                            <label for="payment_method">{{ trans('cruds.radiologistMentor.fields.payment_method') }}</label>
                            <input class="form-control" type="text" name="payment_method" id="payment_method" value="{{ old('payment_method', '') }}">
                            @if($errors->has('payment_method'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_method') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.radiologistMentor.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\RadiologistMentor::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'Inactive') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documents') ? 'has-error' : '' }}">
                            <label for="documents">{{ trans('cruds.radiologistMentor.fields.documents') }}</label>
                            <div class="needsclick dropzone" id="documents-dropzone">
                            </div>
                            @if($errors->has('documents'))
                                <span class="help-block" role="alert">{{ $errors->first('documents') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.radiologistMentor.fields.documents_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.radiologist-mentors.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $radiologistMentor->id ?? 0 }}');
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

<script>
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.radiologist-mentors.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($radiologistMentor) && $radiologistMentor->documents)
          var files =
            {!! json_encode($radiologistMentor->documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection