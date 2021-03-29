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

<a class="logout-button" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

<div class="main" id="app">

    <div class="container">
        <input class="form-tab" placeholder="選考を追加" value="" type="text" name="tab_name" v-model="tab_name" />
        <button class="add-button" @click="tab_store">+</button>

        <button v-for="tab in tabs" @click="company_show">@{{tab.tab_name}}</button>
    </div>

    <div class="container">

        <input class="form-company" placeholder="企業名" v-model="company_name" type="text" />
        <input class="form-company" placeholder="マイページURL" v-model="mypage_url" type="text" />
        <input class="form-company" placeholder="マイページパスワード" v-model="mypage_password" type="text" />
        <input class="form-company" placeholder="tab_id" type="text" v-model="tab_id" />
        <button class="add-button" @click="company_store">+</button>

        <p>@{{company_name}}</p>
        <p>@{{mypage_url}}</p>
        <p>@{{mypage_password}}</p>
        <p>@{{tab_id}}</p>
    </div>

</div>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            tab_name: "",
            message: "",
            tabs: [],
            companies: [],
            company_name: "",
            tab_id: "",
            mypage_url: "",
            mypage_password: "",
        },
        methods: {
            tab_store() {
                axios.post('/api/tab/store', {
                        'tab_name': this.tab_name
                    })
                    .then(res => {
                        this.message = "ok";
                        this.tabs = res.data;
                    })
            },
            company_store() {
                axios.post('/api/company/store', {
                        'company_name': this.company_name,
                        'tab_id': this.tab_id,
                        'mypage_url': this.mypage_url,
                        'mypage_password': this.mypage_password
                    })
                    .then(res => {
                        this.lili = res.data;
                    })
            },
            company_show() {
                axios.post('/api/company/show', {
                        'tab_id': this.tab
                    })
                    .then(res => {
                        this.companies = res.data;
                    })
            }
        },
    })
</script>

@endsection