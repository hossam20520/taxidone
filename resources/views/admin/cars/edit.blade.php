@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.car.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cars.update", [$car->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="carname">{{ trans('cruds.car.fields.carname') }}</label>
                <input class="form-control {{ $errors->has('carname') ? 'is-invalid' : '' }}" type="text" name="carname" id="carname" value="{{ old('carname', $car->carname) }}" required>
                @if($errors->has('carname'))
                    <span class="text-danger">{{ $errors->first('carname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.carname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity_num">{{ trans('cruds.car.fields.identity_num') }}</label>
                <input class="form-control {{ $errors->has('identity_num') ? 'is-invalid' : '' }}" type="text" name="identity_num" id="identity_num" value="{{ old('identity_num', $car->identity_num) }}" required>
                @if($errors->has('identity_num'))
                    <span class="text-danger">{{ $errors->first('identity_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.identity_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identification_number_photo">{{ trans('cruds.car.fields.identification_number_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('identification_number_photo') ? 'is-invalid' : '' }}" id="identification_number_photo-dropzone">
                </div>
                @if($errors->has('identification_number_photo'))
                    <span class="text-danger">{{ $errors->first('identification_number_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.identification_number_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="license_number">{{ trans('cruds.car.fields.license_number') }}</label>
                <input class="form-control {{ $errors->has('license_number') ? 'is-invalid' : '' }}" type="text" name="license_number" id="license_number" value="{{ old('license_number', $car->license_number) }}" required>
                @if($errors->has('license_number'))
                    <span class="text-danger">{{ $errors->first('license_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.license_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license_number_photo">{{ trans('cruds.car.fields.license_number_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('license_number_photo') ? 'is-invalid' : '' }}" id="license_number_photo-dropzone">
                </div>
                @if($errors->has('license_number_photo'))
                    <span class="text-danger">{{ $errors->first('license_number_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.license_number_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="insurance_policy_number">{{ trans('cruds.car.fields.insurance_policy_number') }}</label>
                <input class="form-control {{ $errors->has('insurance_policy_number') ? 'is-invalid' : '' }}" type="text" name="insurance_policy_number" id="insurance_policy_number" value="{{ old('insurance_policy_number', $car->insurance_policy_number) }}">
                @if($errors->has('insurance_policy_number'))
                    <span class="text-danger">{{ $errors->first('insurance_policy_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.insurance_policy_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.car.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.car.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $car->city) }}" required>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.car.fields.city_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.identificationNumberPhotoDropzone = {
    url: '{{ route('admin.cars.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="identification_number_photo"]').remove()
      $('form').append('<input type="hidden" name="identification_number_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="identification_number_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($car) && $car->identification_number_photo)
      var file = {!! json_encode($car->identification_number_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="identification_number_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.licenseNumberPhotoDropzone = {
    url: '{{ route('admin.cars.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="license_number_photo"]').remove()
      $('form').append('<input type="hidden" name="license_number_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="license_number_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($car) && $car->license_number_photo)
      var file = {!! json_encode($car->license_number_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="license_number_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.cars.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($car) && $car->photo)
      var file = {!! json_encode($car->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection