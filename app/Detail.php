<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function eventName()
    {
        return $this->belongsTo(EventsName::class);
    }
    public function eventData()
    {
        return $this->hasMany(EventData::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
