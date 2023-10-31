<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    protected $fillable = [
        'user_id',
        'attendance_id',
        'start_rest_time',
        'finish_rest_time'
    ];

    public function attendance()
        {
            return $this->belongsTo('App\Models\Attendance');
        }
}
