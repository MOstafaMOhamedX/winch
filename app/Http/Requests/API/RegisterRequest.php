<?php

namespace App\Http\Requests\API;

class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
            'device_token' => ['nullable'],
        ];
    }
}
