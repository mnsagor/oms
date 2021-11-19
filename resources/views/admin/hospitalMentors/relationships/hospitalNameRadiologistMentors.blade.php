<div class="content">
    @can('radiologist_mentor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.radiologist-mentors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.radiologistMentor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.radiologistMentor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-hospitalNameRadiologistMentors">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.hospital_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.radiologistMentor.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($radiologistMentors as $key => $radiologistMentor)
                                    <tr data-entry-id="{{ $radiologistMentor->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $radiologistMentor->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $radiologistMentor->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $radiologistMentor->hospital_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RadiologistMentor::STATUS_SELECT[$radiologistMentor->status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('radiologist_mentor_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.radiologist-mentors.show', $radiologistMentor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('radiologist_mentor_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.radiologist-mentors.edit', $radiologistMentor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('radiologist_mentor_delete')
                                                <form action="{{ route('admin.radiologist-mentors.destroy', $radiologistMentor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('radiologist_mentor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.radiologist-mentors.massDestroy') }}",
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
  let table = $('.datatable-hospitalNameRadiologistMentors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection