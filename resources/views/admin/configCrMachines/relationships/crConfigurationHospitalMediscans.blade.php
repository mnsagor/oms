<div class="content">
    @can('hospital_mediscan_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.hospital-mediscans.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.hospitalMediscan.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.hospitalMediscan.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-crConfigurationHospitalMediscans">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.user_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.connection_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.cr_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.dr_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mm_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.ct_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.mri_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.router_reinstallation_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.connection_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalMediscan.fields.machine_available_profile') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hospitalMediscans as $key => $hospitalMediscan)
                                    <tr data-entry-id="{{ $hospitalMediscan->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->user_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->connection_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->cr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->dr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->mm_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->ct_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalMediscan->mri_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->router_reinstallation_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMediscan::CONNECTION_STATUS_SELECT[$hospitalMediscan->connection_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMediscan->machine_available_profile->hospital_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('hospital_mediscan_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.hospital-mediscans.show', $hospitalMediscan->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hospital_mediscan_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.hospital-mediscans.edit', $hospitalMediscan->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hospital_mediscan_delete')
                                                <form action="{{ route('admin.hospital-mediscans.destroy', $hospitalMediscan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('hospital_mediscan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hospital-mediscans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-crConfigurationHospitalMediscans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection