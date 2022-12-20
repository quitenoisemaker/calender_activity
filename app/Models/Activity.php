<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    const ACTIVITY_MAXIMUM = 4;

    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
        'global_status',
    ];

    public function createActivity($request)
    {
        return self::create($request);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'activity_users');
    }

    public function getActivityCount($start_date, $end_date)
    {
        if (self::whereDate('start_date', $start_date)->orWhereDate('end_date', $start_date)->count() > self::ACTIVITY_MAXIMUM) {
            // user found
            return "Maximun activity has been reached for the start_date";
        } elseif (self::whereDate('start_date', $end_date)->orWhereDate('end_date', $end_date)->count() > self::ACTIVITY_MAXIMUM) {
            # code...
            return "Maximun activity has been reached for the end_date";
        }
    }
}
