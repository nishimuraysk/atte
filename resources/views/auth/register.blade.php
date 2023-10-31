@extends('layouts.common_logout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="main-theme__block">
    <p class="main-theme">会員登録</p>
</div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input-form__block">
            <x-text-input id="name" placeholder="名前" class="input-form" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="input-form__block">
            <x-text-input id="email" placeholder="メールアドレス" class="input-form" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-form__block">
            <x-text-input id="password" placeholder="パスワード" class="input-form"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-form__block">
            <x-text-input id="password_confirmation" placeholder="確認用パスワード" class="input-form"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
        </div>
        <div class="input-form__error">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="register-button__block">
            <button class="register-button">
                会員登録
            </button>
        </div>
    </form>

    <!-- Registered Member -->
    <div class="registered-member-message__block">
        <p class="registered-member-message">アカウントをお持ちの方はこちらから</p>
    </div>
    <div class="login-link__block">
        <a href="/login" class="login-link">ログイン</a>
    </div>
@endsection
