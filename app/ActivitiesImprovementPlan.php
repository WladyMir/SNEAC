<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    class ActivitiesImprovementPlan extends Model
{
    protected $fillable=[
        'activity',
        'date',
        'indicator',
        'date_indicator',
        'date_monitoring',
        'improvement_plan_id',
        'detail_monitors,'
    ];
    public function improvementPlan()
    {
        return $this->belongsTo(ImprovementPlan::class);
    }
    public static function findByIdImprovementPlan($id)
    {
        return static::where('improvement_plan_id', $id)->get();
    }
    public function activityResponsable()
    {
        return $this->hasMany(ActivityResponsable::class);
    }
    public function monitoringResponsable()
    {
        return $this->hasMany(MonitoringResponsable::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
