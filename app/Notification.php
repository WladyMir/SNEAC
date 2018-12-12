<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'identificator',
        'name_patient',
        'rut',
        'age',
        'diagnostic',
        'event_date',
        'event_time',
        'occurrence_place_id',
        'notifier_name',
        'notifier_place_id',
        'description',
        'event_consequence',
        'clinical_record',
        'event_type',
        'event_status',
        'classification_data_id',
    ];
    public function eventData()
    {
        return $this->belongsTo(EventData::class);
    }
    public function classificationData()
    {
        return $this->belongsTo(ClassificationData::class);
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
        return static::where('occurrence_place_id',$id)->get();
    }
    public static function findByEventType($event_type)
    {
        return static::where('event_type',$event_type)->get();
    }
    public static function findByStatus($event_status)
    {
        return static::where('event_status',$event_status)->get();
    }
    public function occurrencePlace()
    {
        return $this->belongsTo(Place::class,'occurrence_place_id');
    }

    public function notifierPlace()
    {
        return $this->belongsTo(Place::class,'notifier_place_id');
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
