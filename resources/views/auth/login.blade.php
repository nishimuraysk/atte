@extends('layouts.common_logout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="main-theme__block">
    <p class="main-theme">ログイン</p>
</div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-form__block">
            <x-text-input id="email" class="input-form" type="email" placeholder="メールアドレス" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-form__block">
            <x-text-input id="password" placeholder="パスワード" class="input-form" type="password" name="password" required autocomplete="current-password" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Login -->
        <div class="login-button__block">
            <x-primary-button class="login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Not Member -->
    <div class="not-member-message__block">
        <p class="not-member-message">アカウントをお持ちでない方はこちらから</p>
    </div>
    <div class="register-link__block">
        <a href="/register" class="register-link">会員登録</a>
    </div>
@endsection