<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    public function eventData()
    {
        return $this->hasMany(EventData::class);
    }
    public function eventName()
    {
        return $this->hasMany(EventsName::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
