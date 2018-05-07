<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classifications extends Model
{
    public function eventData()
    {
        return $this->hasMany(EventDatas::class);
    }
    public function eventName()
    {
        return $this->hasMany(EventsNames::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
