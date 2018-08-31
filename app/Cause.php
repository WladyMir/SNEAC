<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $fillable = [
        'root_cause',
        'major_cause',
        ];


    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
}
