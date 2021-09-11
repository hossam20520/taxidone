@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.travel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travel.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.id') }}
                        </th>
                        <td>
                            {{ $travel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel') }}
                        </th>
                        <td>
                            {{ $travel->travel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel_cost') }}
                        </th>
                        <td>
                            {{ $travel->travel_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel_destination_from') }}
                        </th>
                        <td>
                            {{ $travel->travel_destination_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel_destnitation_to') }}
                        </th>
                        <td>
                            {{ $travel->travel_destnitation_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel_destance') }}
                        </th>
                        <td>
                            {{ $travel->travel_destance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.arrival_time') }}
                        </th>
                        <td>
                            {{ $travel->arrival_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.arrival_date') }}
                        </th>
                        <td>
                            {{ $travel->arrival_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.client') }}
                        </th>
                        <td>
                            {{ $travel->client->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.driver') }}
                        </th>
                        <td>
                            {{ $travel->driver->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.travel.fields.travel_status') }}
                        </th>
                        <td>
                            {{ App\Models\Travel::TRAVEL_STATUS_SELECT[$travel->travel_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.travel.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection