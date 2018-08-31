<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsName extends Model
{
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
    public function eventData()
    {
        return $this->hasMany(EventData::class);
    }
    public function detail()
    {
        return $this->hasMany(Detail::class, 'event_name_id');
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
