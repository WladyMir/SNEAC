<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContributoryFactorByReport extends Model
{
    protected $fillable = [
        'origin',
        'factor',
        'detail',
        'report_id',
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
