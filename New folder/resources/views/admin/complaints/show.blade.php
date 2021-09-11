@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.complaint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complaints.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.id') }}
                        </th>
                        <td>
                            {{ $complaint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.complaints') }}
                        </th>
                        <td>
                            {{ $complaint->complaints }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.client') }}
                        </th>
                        <td>
                            {{ $complaint->client->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Complaint::STATUS_SELECT[$complaint->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.complaint.fields.trip') }}
                        </th>
                        <td>
                            {{ $complaint->trip->travel ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.complaints.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection