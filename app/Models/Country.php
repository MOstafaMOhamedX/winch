<?php

namespace App\Models;

class Country extends BaseModel
{
    protected $guarded = [];

    protected $withCount = ['Regions'];

    public function Regions()
    {
        return $this->hasMany(Region::class);
    }

    public function Branches()
    {
        return $this->hasMany(Branch::class);
    }
}
