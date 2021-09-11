@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.complaint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.complaints.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="complaints">{{ trans('cruds.complaint.fields.complaints') }}</label>
                <textarea class="form-control {{ $errors->has('complaints') ? 'is-invalid' : '' }}" name="complaints" id="complaints">{{ old('complaints') }}</textarea>
                @if($errors->has('complaints'))
                    <span class="text-danger">{{ $errors->first('complaints') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.complaints_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.complaint.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.complaint.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Complaint::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trip_id">{{ trans('cruds.complaint.fields.trip') }}</label>
                <select class="form-control select2 {{ $errors->has('trip') ? 'is-invalid' : '' }}" name="trip_id" id="trip_id">
                    @foreach($trips as $id => $entry)
                        <option value="{{ $id }}" {{ old('trip_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('trip'))
                    <span class="text-danger">{{ $errors->first('trip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.complaint.fields.trip_helper') }}</span>
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