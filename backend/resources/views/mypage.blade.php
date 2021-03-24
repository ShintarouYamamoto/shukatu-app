@extends('layouts.app')

@section('title','マイページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="nav row d-flex align-items-center">
    <div class="nav-brand col-lg-9 col-md-7 col-sm-8 col">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>
    <div class="col-lg-3 col-md-5 col-sm-4 col">
    </div>
</div>

<div class="container">

    <div class="card">
        <div class="card-header">
            プロフィール
        </div>
        <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user fa-fw"></i> {{ $user->name }}</h5>
        </div>
    </div>
    
</div>

@endsection