<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    public function contributoryFactor()
    {
        return $this->hasMany(ContributoryFactor::class);
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
