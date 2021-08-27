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
        //$category = Category::where("groupe_id", $group->id)->get();
        $category = Category::where("groupe_id", $group->id)->with(["type","Ads"])->withCount(["type","Ads"])->get();
        // return $category;
        return view('website.category.show', compact("category", "group"));
    }

    public function showProducts($name, $products)
    {
        return view('website.category.allAds', compact('products', "name"));
    }
    public function showProductsNotSub($name, $products)
    {
        return view('website.category.allAds', compact('products', 'name'));
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
        return view('website.category.showOne', compact('ads', "description", "adsFeatures", "idFeat", "features"));
    }
}
