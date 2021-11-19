<div class="content">
    @can('visited_hospital_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.visited-hospitals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.visitedHospital.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.visitedHospital.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-hospitalHrVisitedHospitals">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.is_online') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.visited_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.visitedHospital.fields.visited_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitedHospitals as $key => $visitedHospital)
                                    <tr data-entry-id="{{ $visitedHospital->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $visitedHospital->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $visitedHospital->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\VisitedHospital::STATUS_SELECT[$visitedHospital->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\VisitedHospital::IS_ONLINE_SELECT[$visitedHospital->is_online] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $visitedHospital->visited_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $visitedHospital->visited_by ?? '' }}
                                        </td>
                                        <td>
                                            @can('visited_hospital_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.visited-hospitals.show', $visitedHospital->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('visited_hospital_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.visited-hospitals.edit', $visitedHospital->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('visited_hospital_delete')
                                                <form action="{{ route('admin.visited-hospitals.destroy', $visitedHospital->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('visited_hospital_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.visited-hospitals.massDestroy') }}",
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
  let table = $('.datatable-hospitalHrVisitedHospitals:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection