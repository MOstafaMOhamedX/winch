<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => ['required'],
            'password' => ['required'],
            'device_token'    =>  ['nullable'],
        ];
    }
}
