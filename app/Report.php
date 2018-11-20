<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'notification_id',
        'user_id',
        'status',
        'event_date',
        'service_boss',
        'supervisor',
        'report_writer',
        'place',
        'narration',
        'name_research_leader',
        'cause_id',
        'unsafe_action_id',
        'origin_id',
        'event_date',
        'message',
    ];
    public static function countByStatus($status)
    {
        return static::where('status', $status)->get()->count();
    }
    public static function countByStatusAndUser($status,$id)
    {
        return static::where('status', $status)->where('user_id',$id)->get()->count()
            ;
    }
    public static function findByIdUser($id)
    {
        return static::where('user_id', $id)->get();
    }
    public static function findByIdNotification($id)
    {
        return static::where('notification_id', $id)->first();
    }
    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function unsafeAction()
    {
        return $this->belongsTo(UnsafeAction::class);
    }
    public function cause()
    {
        return $this->belongsTo(Cause::class);
    }

}
