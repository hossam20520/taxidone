<?php

namespace App\Http\Requests;

use App\Models\Confimation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConfimationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('confimation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:confimations,id',
        ];
    }
}
