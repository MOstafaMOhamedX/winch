<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $table = 'drivers';

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function DriverDeviceTokens()
    {
        return $this->hasMany(DriverDeviceToken::class);
    }
}
