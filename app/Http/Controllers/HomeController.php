<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Annonce;
use App\Models\Category;
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
        // $cat=Category::findOrFail($id);
        // $nbre=Annonce::where('category_id',$cat)
        //         ->where('user_id',Auth::user()->id)         
        //         ->count();
        // dd($nbre);        
        $category=Category::all();
        return view('home',compact('category'));
    }
  
    public function viewAdByCategory($id)
    {
        $cat=Category::findOrFail($id);
            $type=Type::where('category_id',$cat->id)
                            ->get();
            // dd($type);
         if (sizeof($type) == 0) {
            $annonce=Annonce::where('category_id',$cat->id)
            ->where('user_id',Auth::user()->id)         
            ->get();
             return view('site.adByCat', compact('annonce'));
         }else{
             return view('subCat', compact('type'));
         }
    }
    public function viewAdBySubCategory($id)
    {
        $type=Type::findOrFail($id);
        // dd($type);
            $annonce=Annonce::where('type_id',$type->id)
                            ->where('user_id',Auth::user()->id)         
                            ->get();
                            // dd($annonce);
        return view('site.adByType',compact('annonce'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('website.index'))->with('success', 'You are logout successfully');
    }
}
