<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $group = Groupe::with("categories")->get();
        // return $group;
        return view('website.dashbaord.home', compact('group'));
    }

    public function viewAdByCategory($id)
    {
        $cat = Category::findOrFail($id);
        $type = Type::withCount('ads')
            ->where('category_id', $cat->id)
            ->get();
        $adsCount = [];
        foreach ($type as $item) {
            $adsCount[$item->id] = Annonce::where("type_id", $item->id)
                ->where("user_id", Auth::user()->id)
                ->get();
        }
        if (sizeof($type) == 0) {
            $annonce = Annonce::where('category_id', $cat->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            return view('site.adByCat', compact('annonce'));
        } else {
            return view('subCat', compact('type', "cat","adsCount"));
        }
    }
    public function viewAdBySubCategory($id)
    {
        $type = Type::findOrFail($id);
        // dd($type);
        $annonce = Annonce::where('type_id', $type->id)
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('site.adByType', compact('annonce'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('site.index'))->with('success', 'You are logout successfully');
    }
}
