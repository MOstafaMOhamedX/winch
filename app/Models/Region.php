<?php

namespace App\Models;

class Region extends BaseModel
{
    protected $guarded = [];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}
