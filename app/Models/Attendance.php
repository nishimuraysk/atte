<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'start_work_time',
        'finish_work_time',
        'date'
    ];

    public function user()
        {
            return $this->belongsTo('App\Models\User');
        }

    public function rests()
        {
            return $this->hasMany('App\Models\Rest');
        }
}
