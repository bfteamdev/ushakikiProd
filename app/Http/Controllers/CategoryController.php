<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Groupe;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view("admin.category.index",compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupe = Groupe::all();
        return view("admin.category.create",compact("groupe"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator();
        $countGroup = Groupe::where("id",$request['groupe_id'])->count();
        if($countGroup === 1){
            Category::firstOrCreate($data);
            return redirect()->route("category.index")->with("success","La categorie a ete enregistre avec succe !!");
        }else{
            return back()->with("error","Le groupe n'existe pas OU n'est pas selectionne !!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $groupe = Groupe::all();
        return view("admin.category.edit",compact("category","groupe"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $this->validator();
        $countGroup = Groupe::where("id",$request['groupe_id'])->count();
        $name = Category::where("name",$request['name'])->count();
        if($countGroup === 1){
           $category->update($data);
            return redirect()->route("category.index")->with("success","La categorie a ete modifier avec succe !!");
        }else{
            return back()->with("error","Le groupe n'existe pas OU n'est pas selectionne !!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("category.index")->with("success","La categorie a ete supprime avec succe !!");
    }

    public function validator(){
        return request()->validate([
            "groupe_id"=> "required",
            "name"=> "required",
            "icon"=> "required",
            "price"=> "required",
        ]);
    }
}
