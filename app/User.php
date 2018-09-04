<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rut','place_id','labor','is_admin','is_quality_attendant',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'is_admin' => 'boolean'
    ];
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
    public function activityResponsable()
    {
        return $this->hasMany(ActivityResponsable::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    public function improvementPlan()
    {
        return $this->hasMany(ActivityResponsable::class);
    }



}
