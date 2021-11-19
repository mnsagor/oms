@extends('layouts.admin')
@section('content')
<div class="content">
    @can('price_agreement_policy_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.price-agreement-policies.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.priceAgreementPolicy.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'PriceAgreementPolicy', 'route' => 'admin.price-agreement-policies.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.priceAgreementPolicy.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PriceAgreementPolicy">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.xray') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.xray_single') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.xray_both') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.xray_contrast') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.ct') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.ct_brain') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.ct_chest') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.ct_other') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.whole_abdomen') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.urogram') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.mri') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.mri_brain') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.mri_spine') }}
                                </th>
                                <th>
                                    {{ trans('cruds.priceAgreementPolicy.fields.mri_other') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('price_agreement_policy_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.price-agreement-policies.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.price-agreement-policies.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'xray', name: 'xray' },
{ data: 'xray_single', name: 'xray_single' },
{ data: 'xray_both', name: 'xray_both' },
{ data: 'xray_contrast', name: 'xray_contrast' },
{ data: 'ct', name: 'ct' },
{ data: 'ct_brain', name: 'ct_brain' },
{ data: 'ct_chest', name: 'ct_chest' },
{ data: 'ct_other', name: 'ct_other' },
{ data: 'whole_abdomen', name: 'whole_abdomen' },
{ data: 'urogram', name: 'urogram' },
{ data: 'mri', name: 'mri' },
{ data: 'mri_brain', name: 'mri_brain' },
{ data: 'mri_spine', name: 'mri_spine' },
{ data: 'mri_other', name: 'mri_other' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PriceAgreementPolicy').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection