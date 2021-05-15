<?php

namespace App\Http\Controllers\Site;

use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Category;
use App\Classes\UrlRandom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        return view('site.home', compact("group"));
    }
    public function viewAllProduct(Annonce $annonce)
    {
        $ad = Annonce::where('category_id', $annonce->id)->where('type_id', $annonce->id)->get();
        // dd($ad);
        // $category = Category::where("groupe_id", $group->id)->get();
        return view('site.category.allAds', compact('ad', 'annonce', 'category'));
    }
    public function searchHome()
    {
        $title = request('annonce');
        if ($title != null) {
            $search = DB::table('annonces')->where('title', 'like', "%$title%")->get();
            foreach ($search as $item) {
                $image = DB::table('photos')->where('annonce_id', $item->id)->first();
                $type = DB::table('types')->where('id', $item->type_id)->get();
                $category = DB::table('categories')->where('id', $item->category_id)->get();
            }
        }
        return view('site.search.home.search', compact('search', 'image', 'type', 'category'));
    }
    public function messageView()
    {
        return view('site.dashbaord.allUserSendMessage');
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
            ->update(["read"=>0]);
        return view('site.dashbaord.message', compact("userInfo"));
    }
    public function profilView()
    {
        return view('site.dashbaord.profil');
    }
    public function changePassword()
    {
        return view('site.dashbaord.changePassword');
    }
}
