<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\BaseRequest;

class CheckNumberRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => ['required'],
        ];
    }
}
