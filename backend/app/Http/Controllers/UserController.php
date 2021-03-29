<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tab;
use App\Company;
use COM;

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

    public function tab_show()
    {
        $user = Auth::user();

        $tab_all = Tab::where('user_id', $user->id)->get();

        return  $tab_all;
    }

    public function tab_store(Request $request)
    {
        $user = Auth::user();

        $validate_rule = [
            'tab_name' => 'required|string|max:50',
        ];
        $this->validate($request, $validate_rule);

        $tab = new Tab;

        $tab->tab_name = $request->tab_name;
        $tab->user_id = $user->id;
        $tab->save();

        $tab_all = Tab::where('user_id', $user->id)->get();

        return  $tab_all;
    }

    public function company_store(Request $request)
    {
        $user = Auth::user();

        $validate_rule = [
            'company_name' => 'required|string|max:50',
        ];
        $this->validate($request, $validate_rule);

        $company = new Company();

        $company->company_name = $request->company_name;
        $company->user_id = $user->id;
        $company->tab_id =  $request->tab_id;
        $company->mypage_url = $request->mypage_url;
        $company->mypage_password = $request->mypage_password;
        $company->save();

        return $company;
    }
    public function company_show(Request $request)
    {
        $companies = Company::where('tab_id', $request->tab_id)->get();

        return $companies;
    }
}
