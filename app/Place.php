<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function eventData()
    {
        return $this->hasMany(EventData::class);
    }

    public function patientData()
    {
        return $this->hasMany(PatientData::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
