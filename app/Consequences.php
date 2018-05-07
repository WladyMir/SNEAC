<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consequences extends Model
{
    public function patientDatas()
    {
        return $this->hasMany(PatientDatas::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
