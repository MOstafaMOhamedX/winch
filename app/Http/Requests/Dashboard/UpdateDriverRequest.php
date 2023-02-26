<?php

namespace App\Http\Requests\Dashboard;

class UpdateDriverRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'status' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
