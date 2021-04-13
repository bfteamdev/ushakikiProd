<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Groupe;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select("*")->orderBy("id", "desc")->get();
        return view("admin.category.index", compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $groupe = Groupe::all();
        return view("admin.category.create", compact("groupe", "category"));
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
        $countGroup = Groupe::where("id", $request['groupe_id'])->count();
        $categoryNameCount = Category::where("name", $request['name'])->count();
        if ($countGroup === 1) {
            if ($categoryNameCount === 0) {
                Category::create($data);
                return redirect()->route("category.index")->with("success", "The category was successfully registered !!");
            } else {
                return back()->withInput()->with("error", "The name of this category is already exist !!");
            }
        } else {
            return back()->withInput()->with("error", "The group does not exist OR is not selected !!");
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
        return view("admin.category.edit", compact("category", "groupe"));
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
        $countGroup = Groupe::where("id", $request['groupe_id'])->count();
        $categoryNameCount = Category::where("name", $data['name'])
            ->where("id", "!=", $category->id)
            ->count();
        if ($countGroup === 1) {
            if ($categoryNameCount === 0) {
                $category->update($data);
                return back()->withInput()->with("success", "The category was successfully registered !!");
            } else {
                return back()->withInput()->with("error", "The name of this category is already exist !!");
            }
        } else {
            return back()->withInput()->with("error", "The group does not exist OR is not selected !!");
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
        return redirect()->route("category.index")->with("success", "The category has been successfully deleted !!");
    }

    private function validator()
    {
        return request()->validate([
            "groupe_id" => "required|numeric",
            "name" => "required|string",
            "icon" => "required|string",
            "price"=>""
        ]);
    }
}
