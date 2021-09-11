<?php

namespace App\Http\Requests;

use App\Models\Subscriptiondriver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubscriptiondriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscriptiondriver_edit');
    }

    public function rules()
    {
        return [
            'subscription_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'expiration_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
