<?php

namespace App\Http\Requests;

use App\Models\Confimation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConfimationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('confimation_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
