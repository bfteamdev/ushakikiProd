<?php

namespace App\Http\Controllers;

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
        $category=Category::all();
        return view('home',compact('category'));
    }
    public function viewAdByCategory($id)
    {
        $cat=Category::findOrFail($id);
            $annonce=Annonce::where('category_id',$cat->id)
                            ->where('user_id',Auth::user()->id)         
                            ->get();
                            // dd($annonce);
        return view('subCat',compact('annonce'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('website.index'))->with('success', 'You are logout successfully');
    }
}
