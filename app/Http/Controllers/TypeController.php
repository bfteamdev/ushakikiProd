<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:ROLE_ADMIN');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::all();
        $chr=Type::where('parent_id',!null)->get();
        // dd($chr);
        return view("admin.type.index",compact("type","chr"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $type=Type::where('parent_id',null)->get();
        return view("admin.type.create",compact("category","type"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            "category_id"=> "required",
            "name"=> "required",
            "parent_id"=>'',
        ]);
        Type::firstOrCreate($data);
        return redirect()->route("sub-category.index")->with("success", "The subcategory was successfully registered !!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit( $type)
    {
        $parent=Type::where('parent_id',null)->get();

        $type = Type::findOrFail($type);

        // dd($type);
        $category = Category::all();

        return view("admin.type.edit",compact("type","category","parent"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $type)
    {
        $data = request()->validate([
            "category_id"=> "required",
            "name"=> "required",
            "parent_id"=>''
        ]);
        $types = Type::findOrFail($type);
        $types->update($data);
        return redirect()->route("sub-category.index")->with("success", "The subcategory was successfully modified !!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($type)
    {
        $types = Type::findOrFail($type);
        // dd($type);
        $types->delete();
        return redirect()->route("sub-category.index")->with("success", "The subcategory has been deleted successfully !!!!");
    }
}
