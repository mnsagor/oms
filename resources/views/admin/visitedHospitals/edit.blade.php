@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.visitedHospital.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.visited-hospitals.update", [$visitedHospital->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.visitedHospital.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $visitedHospital->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.visitedHospital.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\VisitedHospital::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $visitedHospital->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.visitedHospital.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $visitedHospital->email) }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.visitedHospital.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address', $visitedHospital->address) !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_online') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.visitedHospital.fields.is_online') }}</label>
                            <select class="form-control" name="is_online" id="is_online">
                                <option value disabled {{ old('is_online', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\VisitedHospital::IS_ONLINE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('is_online', $visitedHospital->is_online) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('is_online'))
                                <span class="help-block" role="alert">{{ $errors->first('is_online') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.is_online_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('visited_date') ? 'has-error' : '' }}">
                            <label for="visited_date">{{ trans('cruds.visitedHospital.fields.visited_date') }}</label>
                            <input class="form-control date" type="text" name="visited_date" id="visited_date" value="{{ old('visited_date', $visitedHospital->visited_date) }}">
                            @if($errors->has('visited_date'))
                                <span class="help-block" role="alert">{{ $errors->first('visited_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.visited_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('visited_by') ? 'has-error' : '' }}">
                            <label class="required" for="visited_by">{{ trans('cruds.visitedHospital.fields.visited_by') }}</label>
                            <input class="form-control" type="text" name="visited_by" id="visited_by" value="{{ old('visited_by', $visitedHospital->visited_by) }}" required>
                            @if($errors->has('visited_by'))
                                <span class="help-block" role="alert">{{ $errors->first('visited_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.visited_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_company_name') ? 'has-error' : '' }}">
                            <label for="other_company_name">{{ trans('cruds.visitedHospital.fields.other_company_name') }}</label>
                            <input class="form-control" type="text" name="other_company_name" id="other_company_name" value="{{ old('other_company_name', $visitedHospital->other_company_name) }}">
                            @if($errors->has('other_company_name'))
                                <span class="help-block" role="alert">{{ $errors->first('other_company_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.other_company_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_company_price') ? 'has-error' : '' }}">
                            <label for="other_company_price">{{ trans('cruds.visitedHospital.fields.other_company_price') }}</label>
                            <input class="form-control" type="text" name="other_company_price" id="other_company_price" value="{{ old('other_company_price', $visitedHospital->other_company_price) }}">
                            @if($errors->has('other_company_price'))
                                <span class="help-block" role="alert">{{ $errors->first('other_company_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.other_company_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cr_configuration') ? 'has-error' : '' }}">
                            <label for="cr_configuration_id">{{ trans('cruds.visitedHospital.fields.cr_configuration') }}</label>
                            <select class="form-control select2" name="cr_configuration_id" id="cr_configuration_id">
                                @foreach($cr_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('cr_configuration_id') ? old('cr_configuration_id') : $visitedHospital->cr_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cr_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('cr_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.cr_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dr_configuration') ? 'has-error' : '' }}">
                            <label for="dr_configuration_id">{{ trans('cruds.visitedHospital.fields.dr_configuration') }}</label>
                            <select class="form-control select2" name="dr_configuration_id" id="dr_configuration_id">
                                @foreach($dr_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dr_configuration_id') ? old('dr_configuration_id') : $visitedHospital->dr_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dr_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('dr_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.dr_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ct_configuration') ? 'has-error' : '' }}">
                            <label for="ct_configuration_id">{{ trans('cruds.visitedHospital.fields.ct_configuration') }}</label>
                            <select class="form-control select2" name="ct_configuration_id" id="ct_configuration_id">
                                @foreach($ct_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ct_configuration_id') ? old('ct_configuration_id') : $visitedHospital->ct_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ct_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('ct_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.ct_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mri_configuration') ? 'has-error' : '' }}">
                            <label for="mri_configuration_id">{{ trans('cruds.visitedHospital.fields.mri_configuration') }}</label>
                            <select class="form-control select2" name="mri_configuration_id" id="mri_configuration_id">
                                @foreach($mri_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mri_configuration_id') ? old('mri_configuration_id') : $visitedHospital->mri_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mri_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('mri_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.mri_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mm_configuration') ? 'has-error' : '' }}">
                            <label for="mm_configuration_id">{{ trans('cruds.visitedHospital.fields.mm_configuration') }}</label>
                            <select class="form-control select2" name="mm_configuration_id" id="mm_configuration_id">
                                @foreach($mm_configurations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mm_configuration_id') ? old('mm_configuration_id') : $visitedHospital->mm_configuration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mm_configuration'))
                                <span class="help-block" role="alert">{{ $errors->first('mm_configuration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.mm_configuration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospital_hr') ? 'has-error' : '' }}">
                            <label for="hospital_hr_id">{{ trans('cruds.visitedHospital.fields.hospital_hr') }}</label>
                            <select class="form-control select2" name="hospital_hr_id" id="hospital_hr_id">
                                @foreach($hospital_hrs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('hospital_hr_id') ? old('hospital_hr_id') : $visitedHospital->hospital_hr->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hospital_hr'))
                                <span class="help-block" role="alert">{{ $errors->first('hospital_hr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.hospital_hr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dealing_tech') ? 'has-error' : '' }}">
                            <label for="dealing_tech">{{ trans('cruds.visitedHospital.fields.dealing_tech') }}</label>
                            <input class="form-control" type="text" name="dealing_tech" id="dealing_tech" value="{{ old('dealing_tech', $visitedHospital->dealing_tech) }}">
                            @if($errors->has('dealing_tech'))
                                <span class="help-block" role="alert">{{ $errors->first('dealing_tech') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.dealing_tech_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dealing_tech_number') ? 'has-error' : '' }}">
                            <label for="dealing_tech_number">{{ trans('cruds.visitedHospital.fields.dealing_tech_number') }}</label>
                            <input class="form-control" type="text" name="dealing_tech_number" id="dealing_tech_number" value="{{ old('dealing_tech_number', $visitedHospital->dealing_tech_number) }}">
                            @if($errors->has('dealing_tech_number'))
                                <span class="help-block" role="alert">{{ $errors->first('dealing_tech_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.dealing_tech_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bill_send_email') ? 'has-error' : '' }}">
                            <label for="bill_send_email">{{ trans('cruds.visitedHospital.fields.bill_send_email') }}</label>
                            <input class="form-control" type="email" name="bill_send_email" id="bill_send_email" value="{{ old('bill_send_email', $visitedHospital->bill_send_email) }}">
                            @if($errors->has('bill_send_email'))
                                <span class="help-block" role="alert">{{ $errors->first('bill_send_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.bill_send_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('management_software_propose') ? 'has-error' : '' }}">
                            <label for="management_software_propose">{{ trans('cruds.visitedHospital.fields.management_software_propose') }}</label>
                            <textarea class="form-control ckeditor" name="management_software_propose" id="management_software_propose">{!! old('management_software_propose', $visitedHospital->management_software_propose) !!}</textarea>
                            @if($errors->has('management_software_propose'))
                                <span class="help-block" role="alert">{{ $errors->first('management_software_propose') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.management_software_propose_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documents') ? 'has-error' : '' }}">
                            <label for="documents">{{ trans('cruds.visitedHospital.fields.documents') }}</label>
                            <div class="needsclick dropzone" id="documents-dropzone">
                            </div>
                            @if($errors->has('documents'))
                                <span class="help-block" role="alert">{{ $errors->first('documents') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.documents_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                            <label for="comments">{{ trans('cruds.visitedHospital.fields.comments') }}</label>
                            <textarea class="form-control ckeditor" name="comments" id="comments">{!! old('comments', $visitedHospital->comments) !!}</textarea>
                            @if($errors->has('comments'))
                                <span class="help-block" role="alert">{{ $errors->first('comments') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.visitedHospital.fields.comments_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.visited-hospitals.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $visitedHospital->id ?? 0 }}');
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
    url: '{{ route('admin.visited-hospitals.storeMedia') }}',
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
@if(isset($visitedHospital) && $visitedHospital->documents)
          var files =
            {!! json_encode($visitedHospital->documents) !!}
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