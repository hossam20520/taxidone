@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="draw_on_every_travel_a">{{ trans('cruds.setting.fields.draw_on_every_travel_a') }}</label>
                <input class="form-control {{ $errors->has('draw_on_every_travel_a') ? 'is-invalid' : '' }}" type="number" name="draw_on_every_travel_a" id="draw_on_every_travel_a" value="{{ old('draw_on_every_travel_a', $setting->draw_on_every_travel_a) }}" step="0.01">
                @if($errors->has('draw_on_every_travel_a'))
                    <span class="text-danger">{{ $errors->first('draw_on_every_travel_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.draw_on_every_travel_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="draw_on_every_travel_p">{{ trans('cruds.setting.fields.draw_on_every_travel_p') }}</label>
                <input class="form-control {{ $errors->has('draw_on_every_travel_p') ? 'is-invalid' : '' }}" type="number" name="draw_on_every_travel_p" id="draw_on_every_travel_p" value="{{ old('draw_on_every_travel_p', $setting->draw_on_every_travel_p) }}" step="1">
                @if($errors->has('draw_on_every_travel_p'))
                    <span class="text-danger">{{ $errors->first('draw_on_every_travel_p') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.draw_on_every_travel_p_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.setting.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Setting::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $setting->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.type_helper') }}</span>
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