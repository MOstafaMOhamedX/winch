<?php

namespace App\Http\Requests\Dashboard;

class UpdateAddressRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'client_id' => ['nullable', 'nullable', 'exists:clients,id'],
            'region_id' => ['nullable', 'exists:regions,id'],

            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],

            'block' => ['nullable', 'string'],
            'road' => ['nullable', 'string'],
            'floor_no' => ['required', 'string'],
            'apartment' => ['required', 'string'],
            'building_no' => ['nullable', 'string'],
            'type' => ['required'],
            'note' => ['nullable', 'string'],
        ];
    }
}
