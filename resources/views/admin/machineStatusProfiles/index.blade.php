@extends('layouts.admin')
@section('content')
<div class="content">
    @can('machine_status_profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.machine-status-profiles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.machineStatusProfile.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'MachineStatusProfile', 'route' => 'admin.machine-status-profiles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.machineStatusProfile.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MachineStatusProfile">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.hospital_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.ct_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.mri_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.mammography_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.fpd_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.dr_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.cr_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.agfa_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.konica_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.fier_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.ecg_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.simence_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.gee_center') }}
                                </th>
                                <th>
                                    {{ trans('cruds.machineStatusProfile.fields.philips_center') }}
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
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::CT_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::MRI_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::MAMMOGRAPHY_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::FPD_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::DR_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::CR_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::AGFA_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::KONICA_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::FIER_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::ECG_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::SIMENCE_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::GEE_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\MachineStatusProfile::PHILIPS_CENTER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
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
@can('machine_status_profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.machine-status-profiles.massDestroy') }}",
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
    ajax: "{{ route('admin.machine-status-profiles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'hospital_name', name: 'hospital_name' },
{ data: 'ct_center', name: 'ct_center' },
{ data: 'mri_center', name: 'mri_center' },
{ data: 'mammography_center', name: 'mammography_center' },
{ data: 'fpd_center', name: 'fpd_center' },
{ data: 'dr_center', name: 'dr_center' },
{ data: 'cr_center', name: 'cr_center' },
{ data: 'agfa_center', name: 'agfa_center' },
{ data: 'konica_center', name: 'konica_center' },
{ data: 'fier_center', name: 'fier_center' },
{ data: 'ecg_center', name: 'ecg_center' },
{ data: 'simence_center', name: 'simence_center' },
{ data: 'gee_center', name: 'gee_center' },
{ data: 'philips_center', name: 'philips_center' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MachineStatusProfile').DataTable(dtOverrideGlobals);
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