@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.travel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.travel.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="travel">{{ trans('cruds.travel.fields.travel') }}</label>
                <input class="form-control {{ $errors->has('travel') ? 'is-invalid' : '' }}" type="text" name="travel" id="travel" value="{{ old('travel', '') }}" required>
                @if($errors->has('travel'))
                    <span class="text-danger">{{ $errors->first('travel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="travel_cost">{{ trans('cruds.travel.fields.travel_cost') }}</label>
                <input class="form-control {{ $errors->has('travel_cost') ? 'is-invalid' : '' }}" type="number" name="travel_cost" id="travel_cost" value="{{ old('travel_cost', '') }}" step="0.01">
                @if($errors->has('travel_cost'))
                    <span class="text-danger">{{ $errors->first('travel_cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="travel_destination_from">{{ trans('cruds.travel.fields.travel_destination_from') }}</label>
                <input class="form-control {{ $errors->has('travel_destination_from') ? 'is-invalid' : '' }}" type="text" name="travel_destination_from" id="travel_destination_from" value="{{ old('travel_destination_from', '') }}">
                @if($errors->has('travel_destination_from'))
                    <span class="text-danger">{{ $errors->first('travel_destination_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_destination_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="travel_destnitation_to">{{ trans('cruds.travel.fields.travel_destnitation_to') }}</label>
                <input class="form-control {{ $errors->has('travel_destnitation_to') ? 'is-invalid' : '' }}" type="text" name="travel_destnitation_to" id="travel_destnitation_to" value="{{ old('travel_destnitation_to', '') }}">
                @if($errors->has('travel_destnitation_to'))
                    <span class="text-danger">{{ $errors->first('travel_destnitation_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_destnitation_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="travel_destance">{{ trans('cruds.travel.fields.travel_destance') }}</label>
                <input class="form-control {{ $errors->has('travel_destance') ? 'is-invalid' : '' }}" type="number" name="travel_destance" id="travel_destance" value="{{ old('travel_destance', '') }}" step="0.01">
                @if($errors->has('travel_destance'))
                    <span class="text-danger">{{ $errors->first('travel_destance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_destance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arrival_time">{{ trans('cruds.travel.fields.arrival_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" type="text" name="arrival_time" id="arrival_time" value="{{ old('arrival_time') }}">
                @if($errors->has('arrival_time'))
                    <span class="text-danger">{{ $errors->first('arrival_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.arrival_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arrival_date">{{ trans('cruds.travel.fields.arrival_date') }}</label>
                <input class="form-control date {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{ old('arrival_date') }}">
                @if($errors->has('arrival_date'))
                    <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.arrival_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.travel.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.travel.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.travel.fields.travel_status') }}</label>
                <select class="form-control {{ $errors->has('travel_status') ? 'is-invalid' : '' }}" name="travel_status" id="travel_status" required>
                    <option value disabled {{ old('travel_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Travel::TRAVEL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('travel_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('travel_status'))
                    <span class="text-danger">{{ $errors->first('travel_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.travel.fields.travel_status_helper') }}</span>
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