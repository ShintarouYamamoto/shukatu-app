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
        <a class="logout-button" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </div>
</div>


<div class="container" id="app" @mouseover="tab_show">

    <div class="tab-area align-self-center">

        <div class="tab-add">
            <input class="form-tab" placeholder="選考を追加" value="" type="text" name="tab_name" v-model="tab_name" />
            <button class="add-button" @click="tab_store">+</button>
        </div>

        <div class="tab-list">
            <button class="tab-button" v-for="tab in tabs" @click="company_show(tab.id)">@{{tab.tab_name}}</button>
        </div>
    </div>

    <div class="company-area" v-for="tab in tabs" v-if="show_id==tab.id">
        <input class="form-company" placeholder="企業名" v-model="company_name" type="text" />
        <input class="form-company" placeholder="マイページURL" v-model="mypage_url" type="text" />
        <input class="form-company" placeholder="マイページパスワード" v-model="mypage_password" type="text" />
        <button class="add-button" @click="company_store">+</button>
        <div class="company-info" v-for="company in companies">
            <p>@{{company.company_name}}</p>
            <p>パスワード：@{{company.mypage_password}}</p>
            <a v-bind:href="company.mypage_url" target="_blank" rel="noopener noreferrer">マイページへ</a>
        </div>
    </div>

</div>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            tab_name: "",

            tabs: [],
            companies: [],

            company_name: "",
            tab_id: "",
            mypage_url: "",
            mypage_password: "",

            show_id: "",
        },
        methods: {
            tab_show() {
                axios.get('/api/tab/show')
                    .then(res => {
                        this.tabs = res.data;
                    })
            },
            tab_store() {
                axios.post('/api/tab/store', {
                    'tab_name': this.tab_name
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

                    })
            },
            company_show(tab_id) {
                axios.post('/api/company/show', {
                        'tab_id': tab_id
                    })
                    .then(res => {
                        this.tab_id = tab_id;
                        this.show_id = tab_id;
                        this.companies = res.data;
                    })
            }
        },
    })
</script>

@endsection