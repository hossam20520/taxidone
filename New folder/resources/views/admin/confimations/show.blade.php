@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.confimation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.confimations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.confimation.fields.id') }}
                        </th>
                        <td>
                            {{ $confimation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.confimation.fields.code') }}
                        </th>
                        <td>
                            {{ $confimation->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.confimation.fields.user') }}
                        </th>
                        <td>
                            {{ $confimation->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.confimation.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Confimation::STATUS_SELECT[$confimation->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.confimations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection