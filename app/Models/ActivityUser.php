<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityUser extends Model
{
    use HasFactory;


    public function modifyUserActivity($user_id, $activity_id, $new_activity)
    {
        # code...
        $getUserActivity = self::where('user_id', $user_id)->where('activity_id', $activity_id)->first();
        $getUserActivity->activity_id = $new_activity;
        $getUserActivity->save();
    }
}
