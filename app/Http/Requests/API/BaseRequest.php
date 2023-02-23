<?php

namespace App\Http\Requests\API;

use App\Functions\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function failedValidation($validator)
    {
        return ResponseHelper::make(null, $validator->errors()->first(), false, 404);
    }
}
