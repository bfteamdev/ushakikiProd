<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // Google Login;
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->loginWithSocialite($user);
        return redirect()->intended();
    }
    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $this->loginWithSocialite($user);
        return redirect()->intended();
    }
    public function index()
    {
        return view('auth.sigin');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = User::where('email', $request->email)->first();
            if ($user->isAdmin()) {
                return redirect()->back()->with('error', 'creer un compte user svp');
            } else {
                return  redirect()->intended();
                // return  redirect()->route('home');
            }
            Auth::login($user);
        }
        return redirect()->back()->with('error', 'password or email incorrect');
    }
    public function loginWithSocialite($data)
    {
        $user =User::where('email', $data->email)->first();
        if(!$user){
            $user=new User();
            $user->username=$data->name;
            $user->email=$data->email;
            $user->provider_id=$data->id;
            $user->profil=$data->avatar;
            $user->password=password_hash("usHaùà20IKI@12çè&ébor30fler10",PASSWORD_BCRYPT);
            $user->save();
        }
        Auth::login($user);
    }
}
