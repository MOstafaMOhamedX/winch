<?php

namespace App\Http\Requests\API;

class CheckNumberRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => ['required'],
        ];
    }
}
