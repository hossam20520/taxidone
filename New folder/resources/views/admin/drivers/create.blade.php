@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.driver.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.drivers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="wallet">{{ trans('cruds.driver.fields.wallet') }}</label>
                <input class="form-control {{ $errors->has('wallet') ? 'is-invalid' : '' }}" type="number" name="wallet" id="wallet" value="{{ old('wallet', '') }}" step="0.01">
                @if($errors->has('wallet'))
                    <span class="text-danger">{{ $errors->first('wallet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.wallet_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.driver.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.driver.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.driver.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('cruds.driver.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.driver.fields.delete') }}</label>
                <select class="form-control {{ $errors->has('delete') ? 'is-invalid' : '' }}" name="delete" id="delete">
                    <option value disabled {{ old('delete', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Driver::DELETE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('delete', 'no') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('delete'))
                    <span class="text-danger">{{ $errors->first('delete') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.delete_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.driver.fields.confirm') }}</label>
                <select class="form-control {{ $errors->has('confirm') ? 'is-invalid' : '' }}" name="confirm" id="confirm">
                    <option value disabled {{ old('confirm', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Driver::CONFIRM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('confirm', 'no') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('confirm'))
                    <span class="text-danger">{{ $errors->first('confirm') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.confirm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.driver.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.user_helper') }}</span>
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