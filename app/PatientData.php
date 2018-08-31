<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientData extends Model

{
    public function setPatientTypeAttribute($value){
        $this->attributes['patient_type'] = $value ?: null;
    }
        protected $fillable = [
        'name_patient', 'admission_date', 'rut','gender','patient_classification','patient_type','place_id','bed','observation','consequence_id',
    ];

    public function consequence()
    {
        return $this->belongsTo(Consequence::class);
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
