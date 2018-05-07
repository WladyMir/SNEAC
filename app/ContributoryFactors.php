<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributoryFactors extends Model
{
    public function origin()
    {
        return $this->belongsTo(Origins::class);
    }
}
