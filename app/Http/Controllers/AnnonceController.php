<?php

namespace App\Http\Controllers;

use App\Models\Type;
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
      
        $annonce=DB::table('annonces')
                 ->join('categories','annonces.category_id','=', 'categories.id')
                 ->join('users','annonces.user_id','=','users.id')
                 ->where('annonces.category_id','=',4 )
                 ->select('annonces.*','users.username','categories.name')
                 ->orderBy('annonces.id','desc')
                 ->get();
                // dd($annonce); 
        return view("admin.ads.indexImmobilier",compact('annonce'));
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
    public function annonce()
    {
     $ad= Annonce::select("*")->where('user_id',Auth::user()->id )->get();
        return view('site.dashbaord.myAd',compact('ad')); 
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
    
}
