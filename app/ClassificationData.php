<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassificationData extends Model
{
    protected $fillable = [
        'classification_id',
        'events_name_id',
        'other_detail',
        'detail_id',
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
    public function eventsName()
    {
        return $this->belongsTo(EventsName::class);
    }
    public function detail()
    {
        return$this->belongsTo(Detail::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

}
