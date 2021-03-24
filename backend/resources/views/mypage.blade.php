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
        <div>
            <div id="app">
                <button v-on:click="click">選考追加</button>
                <div v-show="show">post area</div>
            </div>
        </div>
    </div>

    <div class="container row">
        <div class="tab col-3">
            <div id="app">
                <button v-on:click="click">ボタン</button>
                <p v-show="show">v-showで分岐</p>
            </div>
        </div>
        <div class="col-1">
        </div>
        <div class="list col-8">
            <p>list</p>
        </div>
    </div>
</div>

<div id="app">
    <example-component></example-component>

</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            show: true
        },
        methods: {
            click: function() {
                this.show = !this.show
            }
        }
    });
</script>
@endsection