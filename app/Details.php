<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public function eventName()
    {
        return $this->belongsTo(EventsNames::class);
    }
    public function eventData()
    {
        return $this->hasMany(EventDatas::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
