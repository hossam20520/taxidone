<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
                'unique:drivers,email,' . request()->route('driver')->id,
            ],
            'phone' => [
                'string',
                'required',
                'unique:drivers,phone,' . request()->route('driver')->id,
            ],
        ];
    }
}
