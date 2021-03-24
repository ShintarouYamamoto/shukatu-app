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
<div class="main">

    <div class="container row">
        <div class="tab col-3">
            <p>tab</p>
        </div>
        <div class="col-1">
        </div>
        <div class="list col-8">
            <p>list</p>
        </div>
    </div>

</div>

<script>

</script>
@endsection