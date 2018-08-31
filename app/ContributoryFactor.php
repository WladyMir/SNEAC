<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributoryFactor extends Model
{
    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
}
