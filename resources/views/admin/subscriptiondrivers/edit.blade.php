@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.subscriptiondriver.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptiondrivers.update", [$subscriptiondriver->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.subscriptiondriver.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('driver_id') ? old('driver_id') : $subscriptiondriver->driver->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscriptiondriver.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscription_id">{{ trans('cruds.subscriptiondriver.fields.subscription') }}</label>
                <select class="form-control select2 {{ $errors->has('subscription') ? 'is-invalid' : '' }}" name="subscription_id" id="subscription_id">
                    @foreach($subscriptions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('subscription_id') ? old('subscription_id') : $subscriptiondriver->subscription->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('subscription'))
                    <span class="text-danger">{{ $errors->first('subscription') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscriptiondriver.fields.subscription_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscription_date">{{ trans('cruds.subscriptiondriver.fields.subscription_date') }}</label>
                <input class="form-control datetime {{ $errors->has('subscription_date') ? 'is-invalid' : '' }}" type="text" name="subscription_date" id="subscription_date" value="{{ old('subscription_date', $subscriptiondriver->subscription_date) }}">
                @if($errors->has('subscription_date'))
                    <span class="text-danger">{{ $errors->first('subscription_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscriptiondriver.fields.subscription_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expiration_date">{{ trans('cruds.subscriptiondriver.fields.expiration_date') }}</label>
                <input class="form-control datetime {{ $errors->has('expiration_date') ? 'is-invalid' : '' }}" type="text" name="expiration_date" id="expiration_date" value="{{ old('expiration_date', $subscriptiondriver->expiration_date) }}">
                @if($errors->has('expiration_date'))
                    <span class="text-danger">{{ $errors->first('expiration_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscriptiondriver.fields.expiration_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.subscriptiondriver.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Subscriptiondriver::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $subscriptiondriver->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscriptiondriver.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection