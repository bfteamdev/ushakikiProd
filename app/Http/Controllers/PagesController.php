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
use Illuminate\Support\Facades\Session;

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
        $category = Category::where("groupe_id", $group->id)->with(["type", "Ads"])->withCount(["type", "Ads"])->get();
        // return $category;
        $adsCount = [];
        foreach ($category as $item) {
            $adsCount[$item->id][] = $item->ads_count;
            foreach ($item->type as $items) {
                if ($item->id === $items->category_id) {
                    $adsCount[$item->id][] = $items->ads_count;
                }
            }
        }
        return view('website.category.show', compact("category", "group", "adsCount"));
    }

    public function showProducts($name, $products)
    {
        // Session::put("session", [
        //     "x" => 2000,
        //     "y" => 4000,
        //     "z" => 6000
        // ]);
        // Session::push("session","FAQ");
        // dd(Session::get("session"));
        // Session::forget("session");

        // dd($products);
        return view('website.category.allAds', compact('products', "name"));
    }
    public function showProductsNotSub($name, $products)
    {
        // $annonce = Annonce::where('category_id', $products)->get();

        return view('website.category.allAds', compact('products', 'name'));
    }
    public function showOne($name, $id)
    {
        $ads = Annonce::where("id", $id)
            ->with(["photos", "featuresAds", "category", "type"])
            ->first();
        // return $ads->title;
        $idFeat = [];
        foreach ($ads->featuresAds as $x) {
            $idFeat[] = $x->feature_id;
        }
        $idFeat = array_unique($idFeat);
        if ($ads->type_id != null) {
            $groupe = $ads->type->category->groupe;
            $category = $ads->type->category;
            $type = $ads->type;
        } else {
            $groupe = $ads->category->groupe;
            $category = $ads->category;
            $type = $ads->type;
        }
        if ($ads->category_id !== null) {
            $randomAds = Annonce::where("category_id", $ads->category_id)->inRandomOrder()->limit(5)->get();
        } else {
            $randomAds = Annonce::where("type_id", $ads->type_id)->inRandomOrder()->limit(5)->get();
        }

        return view('website.category.showOne', compact('ads', "idFeat", "groupe", "category", "type", "randomAds"));
    }
}
