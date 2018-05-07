<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origins extends Model
{
    public function contributoryFactor()
    {
        return $this->hasMany(ContributoryFactors::class);
    }
}
