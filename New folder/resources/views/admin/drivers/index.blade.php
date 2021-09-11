@extends('layouts.admin')
@section('content')
@can('driver_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.drivers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Driver', 'route' => 'admin.drivers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.wallet') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.delete') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.confirm') }}
                        </th>
                        <th>
                            {{ trans('cruds.driver.fields.user') }}
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Driver::DELETE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Driver::CONFIRM_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->approved }}">{{ $item->approved }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $key => $driver)
                        <tr data-entry-id="{{ $driver->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $driver->id ?? '' }}
                            </td>
                            <td>
                                {{ $driver->wallet ?? '' }}
                            </td>
                            <td>
                                {{ $driver->name ?? '' }}
                            </td>
                            <td>
                                {{ $driver->email ?? '' }}
                            </td>
                            <td>
                                {{ $driver->phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Driver::DELETE_SELECT[$driver->delete] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Driver::CONFIRM_SELECT[$driver->confirm] ?? '' }}
                            </td>
                            <td>
                                {{ $driver->user->approved ?? '' }}
                            </td>
                            <td>
                                @can('driver_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.drivers.show', $driver->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('driver_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.drivers.edit', $driver->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('driver_delete')
                                    <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drivers.massDestroy') }}",
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
  let table = $('.datatable-Driver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
})

</script>
@endsection