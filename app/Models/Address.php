<?php

namespace App\Models;

class Address extends BaseModel
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
