<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'patient_datas_id',
        'event_datas_id',
        'origin_id',
        'contributory_factor_id',
        'event_type',
        'event_status',
        'place_id',
        'event_date',
        'event_name_id',
        'name_patient',
    ];
    public function eventData()
    {
        return $this->belongsTo(EventData::class);
    }
    public function patientData()
    {
        return $this->belongsTo(PatientData::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    public static function findByIdPlace($id)
    {
        return static::where('place_id',$id)->get();
    }
    public static function findByEventType($event_type)
    {
        return static::where('event_type',$event_type)->get();
    }
    public static function findByStatus($event_status)
    {
        return static::where('event_status',$event_status)->get();
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public static function countByStatus($status)
    {
        return static::where('event_status', $status)->get()->count();
    }
    public function eventName()
    {
        return $this->belongsTo(EventsName::class);
    }
}
