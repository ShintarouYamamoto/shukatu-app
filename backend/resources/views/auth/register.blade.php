@extends('layouts.app')

@section('title','新規登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')

<div class="container">

    <div class="form-area">

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="theme">
                <h1>新規登録</h1>
            </div>

            <div class="form-group">
                <input class="form-name" placeholder="名前" value="{{ old('name') }}" type="text" name="name" />
                @error('name')
                <p class='error'>入力されていません</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" class="form-email" placeholder="メールアドレス" name="email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <p class='error'>入力されていません</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-password" placeholder="パスワード" name="password" autocomplete="current-password">
                @error('password')
                <p class='error'>入力されていません</p>
                @enderror
            </div>

            <div class="form-group">
                <input id="password-confirm" class="form-password" type="password" class="password-confirm-box" placeholder="確認用パスワード" name="password_confirmation" autocomplete="new-password">
                @error('password')
                <p class='error'>入力されていません</p>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="submit-button">
                    新規登録
                </button>
            </div>

        </form>
    </div>
</div>

@endsection