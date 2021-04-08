<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // use AuthenticatesUsers;
  

    public function index()
    {
        return view('sigin');

    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $remember_me = $request->has('remember_me') ? true : false; 
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
             ])){
                $user = User::where('email',$request->email)->first();
                if($user->isAdmin()){
                    return redirect()->back()->with('error','creer un compte user svp');
                }else{
                    return  redirect()->route('home');
                }
             }
             return redirect()->back()->with('error','password or email incorrect');
            }
}
