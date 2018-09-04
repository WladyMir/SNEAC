<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImprovementPlan extends Model
{
    protected $fillable=[
        'objective',
        'scope',
        'report_id',
        'user_id',
        'status',
    ];
    public static function countByStatus($status)
    {
        return static::where('status','<', $status)->get()->count();
    }
    public static function countByStatusAndUser($status,$id)
    {
        return static::where('status','<', $status)->where('user_id',$id)->get()->count();
    }
    public static function findByIdUser($id)
    {
        return static::where('user_id', $id)->get();
    }
    public function activitiesImprovementPlan()
    {
        return $this->hasMany(ActivitiesImprovementPlan::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
    public static function findByIdReport($id)
    {
        return static::where('report_id', $id)->get();
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
