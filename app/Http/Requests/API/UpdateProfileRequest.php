<?php

namespace App\Http\Requests\API;

class UpdateProfileRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['nullable'],
            'email' => ['required_without:phone'],
            'phone' => ['required_without:email'],
            'password' => ['nullable'],
            'password_confirmation' => ['nullable', 'same:password'],
            'device_token' => ['nullable'],
        ];
    }
}
