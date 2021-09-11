<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
                'unique:clients,phone,' . request()->route('client')->id,
            ],
            'email' => [
                'required',
                'unique:clients,email,' . request()->route('client')->id,
            ],
        ];
    }
}
