<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TestController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;
   
    public function redirectTo(){
        if (Auth::user()->role == "admin") {
            return '/tt';
        }
        
    }

    public function tt(){
        return view('auth.login');
    }
}
