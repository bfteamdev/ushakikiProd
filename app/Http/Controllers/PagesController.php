<?php

namespace App\Http\Controllers;

use Parsedown;
use App\Models\Type;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Annonces_feature;
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
        $category = Category::where("groupe_id", $group->id)->get();
        //    dd($category);
        $ads = Annonce::where("category_id", "!=", null)->get();
        return view('site.category.show', compact("category", "group", "ads"));
    }

    public function showProducts($name, $products)
    {

        $annonce = Annonce::where('type_id', $products)->get();
        return view('site.category.allAds', compact('annonce', 'name'));
    }
    public function showProductsNotSub($name, $products)
    {
        $annonce = Annonce::where('category_id', $products)->get();
        return view('site.category.allAds', compact('annonce', 'name'));
    }
    public function showOne($name, $id)
    {
        // $pro = Annonce::findOrFail($products);
        $ads = Annonce::findOrFail($id);
        $Parsedown = new Parsedown();
        $Parsedown->setSafeMode(true);
        $description = $Parsedown->text($ads->description);
        $adsFeatures = Annonces_feature::where('annonce_id', $id)->get();
        $features = Feature::all();
        $idFeat = [];
        foreach ($adsFeatures as $x) {
            $idFeat[] = $x->feature_id;
        }
        $idFeat = array_unique($idFeat);
        return view('site.category.showOne', compact('ads', "description", "adsFeatures", "idFeat", "features"));
    }
}
