<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Photo;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexImmobilier()
    {

        $annonce = DB::table('annonces')
            ->join('categories', 'annonces.category_id', '=', 'categories.id')
            ->join('users', 'annonces.user_id', '=', 'users.id')
            ->where('annonces.category_id', '=', 4)
            ->select('annonces.*', 'users.username', 'categories.name')
            ->orderBy('annonces.id', 'desc')
            ->get();
        // dd($annonce); 
        return view("admin.ads.indexImmobilier", compact('annonce'));
    }
    public function indexVoiture()
    {
        return view("admin.ads.indexVoiture");
    }
    public function indexTruc()
    {
        return view("admin.ads.indexTruc");
    }
    public function indexService()
    {
        return view("admin.ads.indexService");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Groupe::all();
        $category = Category::all();
        $subCategory = Type::all();
        return view("admin.ads.create", compact("group", "category", "subCategory"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        return view('admin.ads.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        //
    }
    //Dashboard clients
    public function annonceByUser()
    {
        $ads = Annonce::where('user_id', Auth::user()->id)->with(["viewPhoto"])->orderBy('id', 'desc')->paginate(10);
        // return $ads;
        return view('website.dashbaord.myAd', compact('ads'));
    }
    public function viewAnnonce($id)
    {
        $add = Annonce::findOrFail($id);
        $photo = Photo::where('annonce_id', $add->id)->get();
        $group = Groupe::all();
        return view('website.dashbaord.viewAd', compact('add', 'group', 'photo'));
    }
    public function updateAd(Request $request, $id)
    {
        // dd($request->statu);
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'commune' => 'required',
            'zone' => 'required',
            'price' => 'required',
            'statu' => 'required'
        ]);
        $add = Annonce::findOrFail($id);
        $upAd = $add->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'commune' => $request->commune,
            'zone' => $request->zone,
            'price' => $request->price,
            'statu' => $request->statu,

        ]);
        // dd($upAd);
        return back()->with('success', 'the ad is updated succussfuly');
    }
    public function viewRenew($id)
    {
        $add = Annonce::findOrFail($id);
        //    dd($add->category->groupe->name);
        return view('website.dashbaord.renewAd', compact('add'));
    }
    public function searchAdByUser()
    {
        $q = request("q");
        $typeSearch = request("type");
        if (!empty($q) && !empty($typeSearch)) {
            $search = Annonce::where($typeSearch, "like", "%$q%")
                ->where('user_id', Auth::user()->id)
                ->paginate(10);
            // dd($search);
            return view('site.dashbaord.searchMyAd', compact("search"));
        } else {
            return redirect()->route('dashboard.ads');
        }
    }
}
