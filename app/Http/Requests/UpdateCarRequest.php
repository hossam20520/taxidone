<?php

namespace App\Http\Requests;

use App\Models\Car;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_edit');
    }

    public function rules()
    {
        return [
            'carname' => [
                'string',
                'required',
            ],
            'identity_num' => [
                'string',
                'required',
                'unique:cars,identity_num,' . request()->route('car')->id,
            ],
            'license_number' => [
                'string',
                'required',
                'unique:cars,license_number,' . request()->route('car')->id,
            ],
            'insurance_policy_number' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'required',
            ],
        ];
    }
}
