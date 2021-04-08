<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminPageController extends Controller
{

    public function index()
    {
        return view('admin.login.loginAdmin');
    }
    protected function authenticated(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = User::where('email',$request->email)->first();

            if($user->isAdmin()){
                return redirect()->route("admin.dashboad");
            }else{
                
                return back()->with('error', "vous n'etes pas admin ");
            }

        }
        return back()->with('error', "password or email is inncorrect ");

    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'))->with('success', 'You are logout successfully');
    }
    public function forget()
    {
        return view('admin.login.forget');
    }
    public function postForget(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $token = str_random(64);
    
          DB::table('password_resets')->insert(
              ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
          );
        //   event(new ClientRegistedEvent($use));

          Mail::send('admin.login.verifier', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password Notification');
          });
    
          return back()->with('status', 'We have e-mailed your password reset link!');
      }
    
      public function getPassword($token) { 

        return view('admin.login.reset', ['token' => $token]);
     }
     public function updatePassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
      
        ]);
      
        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();
      
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }else{

            $user = User::where('email', $request->email)
                        ->update(['password' => Hash::make($request->password)]);
        
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
        }
      
          return redirect('/admin')->with('message', 'Your password has been changed!');
      
        }
     
}
