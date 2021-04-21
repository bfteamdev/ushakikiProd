<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }
  
   public function showCategory(Groupe $group)
   {
       $category = Category::where("groupe_id",$group->id)->get();
       $ads = Annonce::where("category_id","!=",null)->get();
       return view('site.category.show',compact("category","group","ads"));
   }
}
