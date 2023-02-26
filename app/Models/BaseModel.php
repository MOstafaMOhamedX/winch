<?php

namespace App\Models;

use App\Functions\Upload;
use App\Traits\Status;
use App\Traits\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory, Status, Translate;

    public function getCreatedAtAttribute($date)
    {
        $date = \Carbon\Carbon::parse($date);

        return  $date->format('d-m-Y g:i a');

        return  $date->diffForHumans(\Carbon\Carbon::now());
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeDisActive($query)
    {
        return $query->where('status', 0);
    }

    public function title()
    {
        return $this['title_'.lang()] ?? null;
    }

    public function desc()
    {
        return $this['desc_'.lang()] ?? null;
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($Model) {
            if ($Model->image) {
                Upload::deleteImage($Model->image);
            }
        });
    }
}
