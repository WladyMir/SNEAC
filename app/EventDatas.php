<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDatas extends Model
{
    public function classification()
    {
        return $this->belongsTo(Classifications::class);
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
        return $this->belongsTo(EventsNames::class);
    }
    public function detail()
    {
        return $this->belongsTo(Details::class);
    }
    public function place()
    {
        return $this->belongsTo(Places::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
