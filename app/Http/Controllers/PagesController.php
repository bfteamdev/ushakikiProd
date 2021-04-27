<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    //    dd($category);
       $ads = Annonce::where("category_id","!=",null)->get();
       return view('site.category.show',compact("category","group","ads"));
   }

   public function showProducts($name, $products)
   {

    $annonce=Annonce::where('type_id',$products)->get();
       return view('site.category.allAds',compact('annonce','name'));
   }
   public function showProductsNotSub($name,$products)
   {
       $annonce=Annonce::where('category_id',$products)->get();
       return view('site.category.allAds',compact('annonce','name'));

   }
   public function showOne($name,$id){
    //    $pro=Annonce::findOrFail($products);
       $anno=Annonce::where('id',$id)->get();
    //    dd($anno);
       return view('site.category.showOne',compact('anno'));
   }
}
