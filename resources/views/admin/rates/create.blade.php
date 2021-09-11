@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rates.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="travel_id">{{ trans('cruds.rate.fields.travel') }}</label>
                <select class="form-control select2 {{ $errors->has('travel') ? 'is-invalid' : '' }}" name="travel_id" id="travel_id">
                    @foreach($travel as $id => $entry)
                        <option value="{{ $id }}" {{ old('travel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('travel'))
                    <span class="text-danger">{{ $errors->first('travel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.travel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rate">{{ trans('cruds.rate.fields.rate') }}</label>
                <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" step="1">
                @if($errors->has('rate'))
                    <span class="text-danger">{{ $errors->first('rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.rate.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="feedback">{{ trans('cruds.rate.fields.feedback') }}</label>
                <textarea class="form-control {{ $errors->has('feedback') ? 'is-invalid' : '' }}" name="feedback" id="feedback">{{ old('feedback') }}</textarea>
                @if($errors->has('feedback'))
                    <span class="text-danger">{{ $errors->first('feedback') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rate.fields.feedback_helper') }}</span>
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