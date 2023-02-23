<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\BaseRequest;

class DeviceTokenRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'device_token' => ['required'],
        ];
    }
}
