<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;
    // use HasApiTokens, Notifiable, HasRoles, SoftDeletes;

    protected $guarded = [];

    protected $table = 'clients';

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function DeviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }
}
