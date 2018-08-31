<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    protected $fillable = [
        'name',
        'report_id',
        'participation',
    ];
    

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
}
