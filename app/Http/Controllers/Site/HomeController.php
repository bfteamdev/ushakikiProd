<?php

namespace App\Http\Controllers\Site;

use App\Models\Groupe;
use App\Models\Annonce;
use App\Classes\UrlRandom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function index()
    {
        $group = Groupe::all();
        return view('site.home', compact("group"));
    }
  
    public function searchHome()
    {
        $title=request('annonce');
        if ($title !=null) {
            $search=DB::table('annonces')->where('title', 'like', "%$title%")->get();
            foreach ($search as $item) {
                $image=DB::table('photos')->where('annonce_id', $item->id)->first();
                $type=DB::table('types')->where('id', $item->type_id)->get();
                $category=DB::table('categories')->where('id', $item->category_id)->get();
            }
        }        
        return view('site.search.home.search', compact('search', 'image', 'type', 'category'));
    }
    public function messageView()
    {
        return view('site.dashbaord.message.message');

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