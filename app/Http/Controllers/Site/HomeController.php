<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Client;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Message;
use App\Models\Category;
use App\Classes\UrlRandom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(['index', "viewAllProduct", "searchHome"]);
    }
    //
    public function index()
    {
        $group = Groupe::all();
        return view('website.home', compact("group"));
    }

    public function messageView()
    {
        return view('website.dashbaord.allUserSendMessage');
    }
    public function searchHome(Request $request)
    {
        $title = trim(htmlspecialchars($request->q));
        if ($title != null) {
            $search = DB::table('annonces')->where('title', 'like', "%$title%")->get();
            foreach ($search as $item) {
                $image = DB::table('photos')->where('annonce_id', $item->id)->first();
                $type = DB::table('types')->where('id', $item->type_id)->get();
                $category = DB::table('categories')->where('id', $item->category_id)->get();
            }
            return view('website.search.home.search', compact('search', 'image', 'type', 'category'));
        }else{
            return back();
        }
    }
    public function messageViewOne($idSender)
    {

        $userInfo = User::findOrFail($idSender);
        $messageUnReady = DB::table('messages')
            ->where("sender_id", $idSender)
            ->where("receiver_id", Auth::user()->id)
            ->orWhere("receiver_id", $idSender)
            ->orWhere("sender_id", Auth::user()->id)
            ->where("read", 1)
            ->update(["read" => 0]);
        return view('website.dashbaord.message', compact("userInfo"));

    }
    public function profilView()
    {
        return view('website.dashbaord.profil');
    }
    public function updateProfil(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'organisation' =>'',
            'town' => '',
        ]);
        $user= User::findOrFail(Auth::user()->id);
        // dd($user);
        $user->update([
           'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'username'=>$request->username,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'organisation'=>$request->organisation,
            'town'=>$request->town,
        ]);
        return redirect()->back()->with("success",'the profit is updated successfuly');
    }
    public function changePassword()
    {
        return view('website.dashbaord.changePassword');
    }
    public function changePasswordUpdate(Request $request)
    {
        $password = $request->input('password');
        $new_password=$request->input('new_password');
        $user= User::findOrFail(Auth::user()->id);
        // dd($user);
        $request = request()->validate([
                'password' => 'required',
                'new_password' => ['required'],
                'confirmation_password' => ['same:new_password'],
        ]);
        if (Hash::check($password, optional($user)->password)) { 
            $user->update([
                'password'=> Hash::make($new_password),
                ]);
            return back()->with('success','admin is update successufly');

        }else{
            return back()->with('error','the old password is not correct');
        }
    }
}
