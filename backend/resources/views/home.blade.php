@extends('layouts.app')

@section('title','ホーム')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="nav row d-flex align-items-center">
    <div class="nav-brand col-lg-9 col-md-7 col-sm-8 col">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>
    <div class="col-lg-3 col-md-5 col-sm-4 col">
        <a href="/login" class="nav-button">ログイン</a>
        <a href="/register" class="nav-button">新規登録</a>
    </div>
</div>
@endsection