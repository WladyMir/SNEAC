<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public function patientData()
    {
        return $this->belongsTo(PatientDatas::class);
    }
    protected $fillable = [
        'patient_datas_id',
        'event_datas_id',
        'origin_id',
        'contributory_factor_id',
        'event_type',
        'event_status',
    ];
    public function eventData()
    {
        return $this->belongsTo(EventDatas::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
