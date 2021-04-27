<?php

namespace App\Http\Controllers\Site;

use App\Models\Groupe;
use App\Models\Annonce;
use App\Classes\UrlRandom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function index()
    {
        $group = Groupe::all();
        return view('site.home',compact("group"));
    }
    public function viewAllProduct(Annonce $annonce)
    {
        $ad=Annonce::where('category_id',$annonce->id)->where('type_id',$annonce->id)->get();
        // dd($ad);
        $category = Category::where("groupe_id",$group->id)->get();

        return view('site.category.allAds',compact('ad','annonce','category'));
    }
}
