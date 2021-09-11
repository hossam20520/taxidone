@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.car.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.id') }}
                        </th>
                        <td>
                            {{ $car->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.carname') }}
                        </th>
                        <td>
                            {{ $car->carname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.identity_num') }}
                        </th>
                        <td>
                            {{ $car->identity_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.identification_number_photo') }}
                        </th>
                        <td>
                            @if($car->identification_number_photo)
                                <a href="{{ $car->identification_number_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $car->identification_number_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.license_number') }}
                        </th>
                        <td>
                            {{ $car->license_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.license_number_photo') }}
                        </th>
                        <td>
                            @if($car->license_number_photo)
                                <a href="{{ $car->license_number_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $car->license_number_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.insurance_policy_number') }}
                        </th>
                        <td>
                            {{ $car->insurance_policy_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.photo') }}
                        </th>
                        <td>
                            @if($car->photo)
                                <a href="{{ $car->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $car->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.car.fields.city') }}
                        </th>
                        <td>
                            {{ $car->city }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection