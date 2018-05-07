<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    public function eventData()
    {
        return $this->hasMany(EventDatas::class);
    }

    public function patientData()
    {
        return $this->hasMany(PatientDatas::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
