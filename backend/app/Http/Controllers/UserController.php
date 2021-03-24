<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //最初にログイン確認
    }

    public function show()
    {
        $user = Auth::user();
       
        return view('mypage', ['user' => $user]);
    }
    public function return()
    {
        return redirect('/user/' . Auth::user()->id);
    }
}
