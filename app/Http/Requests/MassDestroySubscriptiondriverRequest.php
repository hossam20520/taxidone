<?php

namespace App\Http\Requests;

use App\Models\Subscriptiondriver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySubscriptiondriverRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('subscriptiondriver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:subscriptiondrivers,id',
        ];
    }
}
