<?php

namespace App\Http\Requests;

use App\Models\Car;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_create');
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
                'unique:cars',
            ],
            'license_number' => [
                'string',
                'required',
                'unique:cars',
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
