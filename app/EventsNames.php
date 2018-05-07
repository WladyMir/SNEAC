<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsNames extends Model
{
    public function classification()
    {
        return $this->belongsTo(Classifications::class);
    }
    public function eventData()
    {
        return $this->hasMany(EventDatas::class);
    }
    public function detail()
    {
        return $this->hasMany(Details::class, 'event_name_id');
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
