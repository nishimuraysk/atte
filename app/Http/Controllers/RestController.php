<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;
use Auth;
use Carbon\Carbon;

class RestController extends Controller
{
    public function start()
    {
        $attendance = Attendance::where('user_id', Auth::user()->id)->where('date', Carbon::now()->format('Y-m-d'))->first();

        if( empty($attendance)){
            return redirect('/')->with('message', '勤務開始の打刻がありません');
        }

        if( !empty($attendance->finish_work_time)) {
            return redirect('/')->with('message', '既に勤務終了の打刻がされています');
        }

        $rest = Rest::where('attendance_id', $attendance->id)->first();

        if( !empty($rest) && (empty($rest->finish_rest_time)) ){
            return redirect('/')->with('message', '休憩終了の打刻がありません');
        }

        $restTime = [
            'attendance_id' => Attendance::where('user_id', Auth::user()->id)->where('date', Carbon::now()->format('Y-m-d'))->first()->id,
            'start_rest_time' => Carbon::now()->format('H:i:s'),
        ];

        Rest::create($restTime);

        return redirect('/');
    }

    public function finish()
    {
        $attendance = Attendance::where('user_id', Auth::user()->id)->where('date', Carbon::now()->format('Y-m-d'))->first();

        if( empty($attendance)){
            return redirect('/')->with('message', '勤務開始の打刻がありません');
        }

        elseif( !empty($attendance->finish_work_time)) {
            return redirect('/')->with('message', '既に勤務終了の打刻がされています');
        }

        $attendance_id = $attendance->id;
        $rest = Rest::where('attendance_id', $attendance_id)->latest()->first();

        if( empty($rest)){
            return redirect('/')->with('message', '休憩開始の打刻がありません');
        }

        elseif( ( !empty($rest) ) && (!empty($rest->finish_rest_time))) {
            return redirect('/')->with('message', '既に休憩終了の打刻がされています');
        }

        $rest->update([
            'finish_rest_time' => Carbon::now()->format('H:i:s')
        ]);

        return redirect('/');
    }
}
