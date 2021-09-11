<?php

namespace App\Http\Requests;

use App\Models\Travel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTravelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('travel_edit');
    }

    public function rules()
    {
        return [
            'travel' => [
                'string',
                'required',
            ],
            'travel_destination_from' => [
                'string',
                'nullable',
            ],
            'travel_destnitation_to' => [
                'string',
                'nullable',
            ],
            'travel_destance' => [
                'numeric',
            ],
            'arrival_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'arrival_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'travel_status' => [
                'required',
            ],
        ];
    }
}
