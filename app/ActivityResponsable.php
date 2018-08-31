<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityResponsable extends Model
{
    protected $fillable=[
        'user_id',
        'labor',
        'activity_id',
        'name',
        'position',
    ];


    public function improvementPlan()
    {
        return $this->belongsTo(ImprovementPlan::class);
    }
    public function activitiesImprovementPlan()
    {
        return $this->belongsTo(ActivitiesImprovementPlan::class);
    }
    public static function findByIdUser($id)
    {
        return static::where('user_id', $id)->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function findByIdActivity($id)
    {
        return static::where('activity_id', $id)->get();
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
