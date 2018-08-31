<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributoryFactorForNotification extends Model
{
    protected $fillable = [
        'notification_id',
        'contributory_factor_id',
    ];
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function contributoryFactor()
    {
        return $this->hasMany(ContributoryFactor::class);
    }
}

