@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.leave.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.leaves.update", [$leave->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('emp_name') ? 'has-error' : '' }}">
                            <label class="required" for="emp_name_id">{{ trans('cruds.leave.fields.emp_name') }}</label>
                            <select class="form-control select2" name="emp_name_id" id="emp_name_id" required>
                                @foreach($emp_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('emp_name_id') ? old('emp_name_id') : $leave->emp_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('emp_name'))
                                <span class="help-block" role="alert">{{ $errors->first('emp_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.leave.fields.emp_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.leave.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Leave::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $leave->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.leave.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.leave.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $leave->date) }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.leave.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_day') ? 'has-error' : '' }}">
                            <label class="required" for="total_day">{{ trans('cruds.leave.fields.total_day') }}</label>
                            <input class="form-control" type="text" name="total_day" id="total_day" value="{{ old('total_day', $leave->total_day) }}" required>
                            @if($errors->has('total_day'))
                                <span class="help-block" role="alert">{{ $errors->first('total_day') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.leave.fields.total_day_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                            <label for="reason">{{ trans('cruds.leave.fields.reason') }}</label>
                            <textarea class="form-control ckeditor" name="reason" id="reason">{!! old('reason', $leave->reason) !!}</textarea>
                            @if($errors->has('reason'))
                                <span class="help-block" role="alert">{{ $errors->first('reason') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.leave.fields.reason_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.leaves.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $leave->id ?? 0 }}');
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