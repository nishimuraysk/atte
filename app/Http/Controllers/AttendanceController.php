<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Pagination\Paginator;

class AttendanceController extends Controller
{

    public function redirect()
    {
        $today = Carbon::now()->format('Y-m-d');
        return redirect("/attendance/$today");
    }

    public function index(Request $request, $date)
    {
        $page = $request->input('page');

        if( is_null($page) ){
            $page = 1;
        } else {
            $page = (int)$page;
        }

        list($year, $month, $day) = explode('-', $date);

        if(!checkdate($month,$day,$year)){
            $today = Carbon::now()->format('Y-m-d');
            return redirect("/attendance/$today");
        }

        $attendances = Attendance::with('user')->where('date', $date)->Paginate(5);

        if ($page <= 0 || $page > $attendances->lastPage()){
            return redirect("/attendance/$date");
        }

        $users = User::all();

        foreach ($attendances as $attendance) {
            $attendance_id = $attendance->id;
            $rests = Rest::where('attendance_id', $attendance_id)->get();

            $restTimeSum = 0;
            foreach ($rests as $rest) {
                $startRestTime = $rest->start_rest_time;
                $finishRestTime = $rest->finish_rest_time;

                if( empty($finishRestTime) ){
                    $differenceRestTime = null;
                } else {
                    $differenceRestTime = strtotime($finishRestTime) - strtotime($startRestTime);
                }

                $restTimeSum += $differenceRestTime;
            }

            $startWorkTime = $attendance->start_work_time;
            $finishWorkTime = $attendance->finish_work_time;

            if( !empty($finishWorkTime) ){
                $attendanceTimeSum = strtotime($finishWorkTime) - strtotime($startWorkTime) - $restTimeSum;

                $attendance['restTimeSum'] = gmdate("H:i:s", $restTimeSum);
                $attendance['attendanceTimeSum'] = gmdate("H:i:s", $attendanceTimeSum);
            } else {
                $attendanceTimeSum = null;

                $attendance['restTimeSum'] = gmdate("H:i:s", $restTimeSum);
            }
        }

        $dayBefore  = date('Y-m-d', strtotime($date . '-1 day'));

        $nextDay = date('Y-m-d', strtotime($date . '+1 day'));

        return view('attendance', ['data'=>$date, 'attendances'=>$attendances, 'dayBefore'=>$dayBefore, 'nextDay'=>$nextDay, 'users'=>$users]);
    }

    public function start()
    {
        $attendance = Attendance::where('user_id', Auth::user()->id)->where('date', Carbon::now()->format('Y-m-d'))->first();

        if( !empty($attendance) ){
            return redirect('/')->with('error', 'すでに勤務開始の打刻がされています');
        }

        $dateTime = [
            'user_id' => Auth::user()->id,
            'start_work_time' => Carbon::now()->format('H:i:s'),
            'date' => Carbon::now()->format('Y-m-d')
        ];

        Attendance::create($dateTime);

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

        if( (!empty($rest)) && (empty($rest->finish_rest_time)) ){
            return redirect('/')->with('message', '休憩終了の打刻がありません');
        }

        $attendance->update([
            'finish_work_time' => Carbon::now()->format('H:i:s')
        ]);

        return redirect('/');
    }
}