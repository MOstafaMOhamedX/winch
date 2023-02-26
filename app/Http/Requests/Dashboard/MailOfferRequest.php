<?php

namespace App\Http\Requests\Dashboard;

class MailOfferRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }
}
