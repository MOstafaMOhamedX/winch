<?php

namespace App\Models;

class Transaction extends BaseModel
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
