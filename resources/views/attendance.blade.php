@extends('layouts.common_login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection

@section('content')
<div class="date-container">
    <div class="date-link-container">
        <a href="/attendance/{{$dayBefore}}" class="date-link"><</a>
    </div>
    <div>
        {{$data}}
    </div>
    <div class="date-link-container">
        <a href="/attendance/{{$nextDay}}" class="date-link">></a>
    </div>
</div>
<div class="attendance-table">
    <table class="attendance-table__inner">
        <tr class="attendance-table__row">
            <th class="attendance-table__header">名前</th>
            <th class="attendance-table__header">勤務開始</th>
            <th class="attendance-table__header">勤務終了</th>
            <th class="attendance-table__header">休憩時間</th>
            <th class="attendance-table__header">勤務時間</th>
        </tr>
        @foreach ($attendances as $attendance)
        <tr class="attendance-table__row">
            <td class="attendance-table__item">{{ $attendance['user']['name'] }}</td>
            <td class="attendance-table__item">{{ $attendance['start_work_time'] }}</td>
            <td class="attendance-table__item">{{ $attendance['finish_work_time'] }}</td>
            <td class="attendance-table__item">{{ $attendance['restTimeSum'] }}</td>
            <td class="attendance-table__item">{{ $attendance['attendanceTimeSum'] }}</td>
        </tr>
        @endforeach
    </table>
    <div class="pagination">
        {!! $attendances->links() !!}
    </div>
</div>
@endsection