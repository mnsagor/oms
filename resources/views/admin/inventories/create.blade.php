@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.inventory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.inventories.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.inventory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('purchase_date') ? 'has-error' : '' }}">
                            <label for="purchase_date">{{ trans('cruds.inventory.fields.purchase_date') }}</label>
                            <input class="form-control date" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date') }}">
                            @if($errors->has('purchase_date'))
                                <span class="help-block" role="alert">{{ $errors->first('purchase_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.purchase_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('warrenty') ? 'has-error' : '' }}">
                            <label for="warrenty">{{ trans('cruds.inventory.fields.warrenty') }}</label>
                            <input class="form-control" type="text" name="warrenty" id="warrenty" value="{{ old('warrenty', '') }}">
                            @if($errors->has('warrenty'))
                                <span class="help-block" role="alert">{{ $errors->first('warrenty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.warrenty_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.inventory.fields.price') }}</label>
                            <input class="form-control" type="text" name="price" id="price" value="{{ old('price', '') }}" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('credit') ? 'has-error' : '' }}">
                            <label class="required" for="credit">{{ trans('cruds.inventory.fields.credit') }}</label>
                            <input class="form-control" type="text" name="credit" id="credit" value="{{ old('credit', '') }}" required>
                            @if($errors->has('credit'))
                                <span class="help-block" role="alert">{{ $errors->first('credit') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.credit_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('due') ? 'has-error' : '' }}">
                            <label for="due">{{ trans('cruds.inventory.fields.due') }}</label>
                            <input class="form-control" type="text" name="due" id="due" value="{{ old('due', '') }}">
                            @if($errors->has('due'))
                                <span class="help-block" role="alert">{{ $errors->first('due') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.due_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_damage') ? 'has-error' : '' }}">
                            <label for="is_damage">{{ trans('cruds.inventory.fields.is_damage') }}</label>
                            <input class="form-control" type="text" name="is_damage" id="is_damage" value="{{ old('is_damage', '') }}">
                            @if($errors->has('is_damage'))
                                <span class="help-block" role="alert">{{ $errors->first('is_damage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.is_damage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stock_balance') ? 'has-error' : '' }}">
                            <label for="stock_balance">{{ trans('cruds.inventory.fields.stock_balance') }}</label>
                            <input class="form-control" type="text" name="stock_balance" id="stock_balance" value="{{ old('stock_balance', '') }}">
                            @if($errors->has('stock_balance'))
                                <span class="help-block" role="alert">{{ $errors->first('stock_balance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.stock_balance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('supplier_info') ? 'has-error' : '' }}">
                            <label for="supplier_info">{{ trans('cruds.inventory.fields.supplier_info') }}</label>
                            <textarea class="form-control ckeditor" name="supplier_info" id="supplier_info">{!! old('supplier_info') !!}</textarea>
                            @if($errors->has('supplier_info'))
                                <span class="help-block" role="alert">{{ $errors->first('supplier_info') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.supplier_info_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.inventories.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $inventory->id ?? 0 }}');
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