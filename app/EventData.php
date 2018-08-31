<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventData extends Model
{
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
    protected $fillable = [
        'event_date',
        'event_time',
        'classification_id',
        'event_name_id',
        'details_id',
        'place_id',
        'detail_text',
        'description',
        'prevention_measures',
        'measures_taken',
    ];
    public function eventName()
    {
        return $this->belongsTo(EventsName::class);
    }
    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
