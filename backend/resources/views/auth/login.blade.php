@extends('layouts.app')

@section('title','ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')

<div class="container">


    <div class="form-area">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="theme">
                <h1>ログイン</h1>
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
                <input class="form-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">パスワードを記憶する</label>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button">
                    ログイン
                </button>
            </div>

        </form>
    </div>
</div>

@endsection