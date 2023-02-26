<?php

namespace App\Http\Requests\API;

class OTPRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => 'required|min:6',
        ];
    }
}
