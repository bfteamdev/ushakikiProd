<?php

namespace App\Http\Controllers\Site;

use App\Classes\UrlRandom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groupe;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function index()
    {
        $group = Groupe::all();
        return view('site.home',compact("group"));
    }
}
