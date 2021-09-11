@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subscriptiondriver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscriptiondrivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.id') }}
                        </th>
                        <td>
                            {{ $subscriptiondriver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.driver') }}
                        </th>
                        <td>
                            {{ $subscriptiondriver->driver->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.subscription') }}
                        </th>
                        <td>
                            {{ $subscriptiondriver->subscription->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.subscription_date') }}
                        </th>
                        <td>
                            {{ $subscriptiondriver->subscription_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.expiration_date') }}
                        </th>
                        <td>
                            {{ $subscriptiondriver->expiration_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriptiondriver.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Subscriptiondriver::STATUS_SELECT[$subscriptiondriver->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscriptiondrivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection