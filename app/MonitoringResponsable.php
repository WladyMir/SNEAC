<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringResponsable extends Model
{
    protected $fillable=[
        'user_id',
        'name',
        'labor',
        'activity_id',
        'improvement_plan_id',
    ];

    public function improvementPlan()
    {
        return $this->belongsTo(ImprovementPlan::class);
    }
    public static function findByIdImprovementPlan($id)
    {
        return static::where('improvement_plan_id', $id)->get();
    }
    public function activity()
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
