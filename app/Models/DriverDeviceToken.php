<?php

namespace App\Models;

class DriverDeviceToken extends BaseModel
{
    protected $guarded = [];
    
    protected $table = 'drivers_device_token'; 
    
    public function driver()
    {
        return $this->belongsTo(Driver::class)->withTrashed();
    }

}
