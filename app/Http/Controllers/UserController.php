<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;

class UserController extends Controller
{
    public function index()
    {
        $attendance = Attendance::where('user_id', Auth::user()->id)->where('date', Carbon::now()->format('Y-m-d'))->first();

        if( empty($attendance) ){
            return view('index');
        }

        $lastStartWorkTime = $attendance->start_work_time;
        $lastFinishWorkTime = $attendance->finish_work_time;

        $rest = Rest::where('attendance_id', $attendance->id)->latest()->first();

        if( empty($rest) ){
            return view('index', compact('lastStartWorkTime','lastFinishWorkTime'));
        }

        $lastStartRestTime = $rest->start_rest_time;
        $lastFinishRestTime = $rest->finish_rest_time;

        return view('index', compact('lastStartWorkTime','lastFinishWorkTime','lastStartRestTime','lastFinishRestTime'));
    }
}
