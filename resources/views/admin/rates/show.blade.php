@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.id') }}
                        </th>
                        <td>
                            {{ $rate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.travel') }}
                        </th>
                        <td>
                            {{ $rate->travel->travel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.rate') }}
                        </th>
                        <td>
                            {{ $rate->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.client') }}
                        </th>
                        <td>
                            {{ $rate->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rate.fields.feedback') }}
                        </th>
                        <td>
                            {{ $rate->feedback }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection