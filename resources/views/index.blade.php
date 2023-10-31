@extends('layouts.common_login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="action_message--container">
    @if(session('error'))
        <div class="action_message">
            {{ session('error') }}
        </div>
    @endif
    @if(session('message'))
        <div class="action_message">
            {{ session('message') }}
        </div>
    @endif
</div>

<div class="welcome-message">
    {{ Auth::user()->name }}さんお疲れ様です！
</div>

@if ( empty($lastStartWorkTime) )
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item">
                <a href="/attendance/start" class="attendance-button__link">
                    勤務開始
                </a>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務終了
                </div>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩開始
                </div>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩終了
                </div>
            </div>
        </div>
    </div>

@elseif ( !empty($lastStartWorkTime) && !empty($lastFinishWorkTime) )
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務開始
                </div>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務終了
                </div>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩開始
                </div>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩終了
                </div>
            </div>
        </div>
    </div>

@elseif ( !empty($lastStartWorkTime) && empty($lastFinishWorkTime) && empty($lastStartRestTime) )
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務開始
                </div>
            </div>
            <div class="attendance-button__item">
                <a href="/attendance/finish" class="attendance-button__link">
                    勤務終了
                </a>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item">
                <a href="/rest/start" class="attendance-button__link">
                    休憩開始
                </a>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩終了
                </div>
            </div>
        </div>
    </div>

@elseif ( !empty($lastStartWorkTime) && empty($lastFinishWorkTime) && !empty($lastStartRestTime) && empty($lastFinishRestTime) )
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務開始
                </div>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務終了
                </div>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩開始
                </div>
            </div>
            <div class="attendance-button__item">
                <a href="/rest/finish" class="attendance-button__link">
                    休憩終了
                </a>
            </div>
        </div>
    </div>

@elseif ( !empty($lastStartWorkTime) && empty($lastFinishWorkTime) && !empty($lastStartRestTime) && !empty($lastFinishRestTime) )
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    勤務開始
                </div>
            </div>
            <div class="attendance-button__item">
                <a href="/attendance/finish" class="attendance-button__link">
                    勤務終了
                </a>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item">
                <a href="/rest/start" class="attendance-button__link">
                    休憩開始
                </a>
            </div>
            <div class="attendance-button__item__disable">
                <div class="attendance-button__link__disable">
                    休憩終了
                </div>
            </div>
        </div>
    </div>

@else
    <div class="attendance-button__container">
        <div class="attendance-button">
            <div class="attendance-button__item">
                <a href="/attendance/start" class="attendance-button__link">
                    勤務開始
                </a>
            </div>
            <div class="attendance-button__item">
                <a href="/attendance/finish" class="attendance-button__link">
                    勤務終了
                </a>
            </div>
        </div>
        <div class="attendance-button">
            <div class="attendance-button__item">
                <a href="/rest/start" class="attendance-button__link">
                    休憩開始
                </a>
            </div>
            <div class="attendance-button__item">
                <a href="/rest/finish" class="attendance-button__link">
                    休憩終了
                </a>
            </div>
        </div>
    </div>
@endif
@endsection