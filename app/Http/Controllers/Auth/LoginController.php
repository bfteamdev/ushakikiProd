<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    // protected $redirectTo;

    // public function redirectTo()
    // {
    //     if (Auth::user()->isAdmin()) {
    //         return 'admin/dashboad';
    //     }
    //     return '/';
    // }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated(Request $request)
    // {
    // dd(Auth::user()->role);
    // if (Auth::user()->role === "admin") {
    //  return redirect()->route("test");
    //return redirect()->route('login')->with("error","vous n'avez pas un compte user ");
    //     }
    // }
}
