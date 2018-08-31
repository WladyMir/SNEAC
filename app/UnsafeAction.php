<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnsafeAction extends Model
{
    protected $fillable = [
        'type_error',
        'planningAction',
        'executionAction',
        'executionOmission',
        'planningOmission',
    ];
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

}
