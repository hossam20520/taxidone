<?php

namespace App\Http\Requests;

use App\Models\Rate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rate_edit');
    }

    public function rules()
    {
        return [
            'rate' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
