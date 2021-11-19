<div class="content">
    @can('hospital_five_c_network_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.hospital-five-c-networks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.hospitalFiveCNetwork.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.hospitalFiveCNetwork.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-hospitalHrHospitalFiveCNetworks">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.user_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.connection_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.cr_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.dr_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mm_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.ct_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.mri_router_license_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.router_reinstallation_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.connection_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.hospitalFiveCNetwork.fields.machine_available_profile') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hospitalFiveCNetworks as $key => $hospitalFiveCNetwork)
                                    <tr data-entry-id="{{ $hospitalFiveCNetwork->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->user_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->connection_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->cr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->dr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->mm_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->ct_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalFiveCNetwork->mri_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->router_reinstallation_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalFiveCNetwork::CONNECTION_STATUS_SELECT[$hospitalFiveCNetwork->connection_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalFiveCNetwork->machine_available_profile->hospital_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('hospital_five_c_network_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.hospital-five-c-networks.show', $hospitalFiveCNetwork->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hospital_five_c_network_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.hospital-five-c-networks.edit', $hospitalFiveCNetwork->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hospital_five_c_network_delete')
                                                <form action="{{ route('admin.hospital-five-c-networks.destroy', $hospitalFiveCNetwork->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hospital_five_c_network_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hospital-five-c-networks.massDestroy') }}",
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
  let table = $('.datatable-hospitalHrHospitalFiveCNetworks:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection