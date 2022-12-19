<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'image',
        'start_date',
        'end_date',
    ];

    public function createActivity($request)
    {
        return self::create($request);
    }
}
