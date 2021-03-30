<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\Category;
use App\Models\Type;

class AddAnnouce extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGroup()
    {
        $group = Groupe::all();
        return view('site.createAdd', compact('group'));
    }
    
    /**
     * @param Groupe $groupe
     * Display a listing of the resource they passed in param.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategory(Groupe $group)
    {
        $category = Category::where('groupe_id', $group->id)->get();
        return view('site.subCategoryAd', compact('category'));
    }
    
    /**
     * @param Groupe $groupe
     * Display a listing of the resource they passed in param.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddMoreInformation(Category $category)
    {
        $subCategory = Type::where('category_id', $category->id)->get();
        return view('site.addMoreInfo', compact('subCategory'));
    }
}
