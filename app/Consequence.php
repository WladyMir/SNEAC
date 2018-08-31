<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consequence extends Model
{
    public function patientDatas()
    {
        return $this->hasMany(PatientData::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
