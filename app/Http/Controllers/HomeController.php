<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tw;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
             $tws=Tw::getTwWithUser();
            return view('home',['tweets'=>$tws,'saved'=>false]);
        }else{
            return redirect('login');
        }

    }

    public function add(Request $request)
    {
        Tw::create($request->except('_token'));
        return redirect('home','302');
    }

}
