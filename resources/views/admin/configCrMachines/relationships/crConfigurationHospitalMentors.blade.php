<div class="content">
    @can('hospital_mentor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.hospital-mentors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.hospitalMentor.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-crConfigurationHospitalMentors">
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
                            </thead>
                            <tbody>
                                @foreach($hospitalMentors as $key => $hospitalMentor)
                                    <tr data-entry-id="{{ $hospitalMentor->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $hospitalMentor->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMentor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMentor->user_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMentor->connection_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::CR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->cr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::DR_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->dr_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::MM_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->mm_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::CT_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->ct_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::MRI_ROUTER_LICENSE_STATUS_SELECT[$hospitalMentor->mri_router_license_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMentor->router_reinstallation_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\HospitalMentor::CONNECTION_STATUS_SELECT[$hospitalMentor->connection_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $hospitalMentor->machine_available_profile->hospital_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('hospital_mentor_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.hospital-mentors.show', $hospitalMentor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('hospital_mentor_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.hospital-mentors.edit', $hospitalMentor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('hospital_mentor_delete')
                                                <form action="{{ route('admin.hospital-mentors.destroy', $hospitalMentor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hospital_mentor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hospital-mentors.massDestroy') }}",
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
  let table = $('.datatable-crConfigurationHospitalMentors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection