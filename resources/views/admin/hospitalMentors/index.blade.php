@extends('layouts.admin')
@section('content')
<div class="content">
    @can('hospital_mentor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.hospital-mentors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.hospitalMentor.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'HospitalMentor', 'route' => 'admin.hospital-mentors.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.hospitalMentor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-HospitalMentor">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.user_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.connection_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.cr_router_license_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.dr_router_license_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.mm_router_license_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.ct_router_license_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.mri_router_license_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.router_reinstallation_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.connection_status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.hospitalMentor.fields.machine_available_profile') }}
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
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::CR_ROUTER_LICENSE_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::DR_ROUTER_LICENSE_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::MM_ROUTER_LICENSE_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::CT_ROUTER_LICENSE_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::MRI_ROUTER_LICENSE_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\HospitalMentor::CONNECTION_STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($machine_status_profiles as $key => $item)
                                            <option value="{{ $item->hospital_name }}">{{ $item->hospital_name }}</option>
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
@can('hospital_mentor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hospital-mentors.massDestroy') }}",
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
    ajax: "{{ route('admin.hospital-mentors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'user_name', name: 'user_name' },
{ data: 'connection_date', name: 'connection_date' },
{ data: 'cr_router_license_status', name: 'cr_router_license_status' },
{ data: 'dr_router_license_status', name: 'dr_router_license_status' },
{ data: 'mm_router_license_status', name: 'mm_router_license_status' },
{ data: 'ct_router_license_status', name: 'ct_router_license_status' },
{ data: 'mri_router_license_status', name: 'mri_router_license_status' },
{ data: 'router_reinstallation_date', name: 'router_reinstallation_date' },
{ data: 'connection_status', name: 'connection_status' },
{ data: 'machine_available_profile_hospital_name', name: 'machine_available_profile.hospital_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-HospitalMentor').DataTable(dtOverrideGlobals);
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