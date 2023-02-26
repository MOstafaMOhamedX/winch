<?php

namespace App\Http\Requests\Dashboard;

class StoreCouponRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'code' => ['required', 'string'],
            'type' => ['required', 'string'],

            'discount' => ['nullable', 'numeric'],
            'percent_off' => ['nullable', 'numeric'],

            'from' => ['required', 'date'],
            'to' => ['required', 'date'],

            'status' => ['required', 'boolean'],
        ];
    }
}
