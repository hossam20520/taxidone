<?php

namespace App\Http\Requests;

use App\Models\Confimation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConfimationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('confimation_edit');
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
