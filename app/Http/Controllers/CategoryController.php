<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Category;
use App\Models\Feature;
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
        $category = Category::all();
        return view("admin.category.index", compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupe = Groupe::all();
        return view("admin.category.create", compact("groupe"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $this->validator();
        $countGroup = Groupe::where("id", $request['groupe_id'])->count();
        if ($countGroup === 1) {
            Category::firstOrCreate($data);
            $category_id = DB::getPdo()->lastInsertId();
            if ($request['features'][0]["name"] !== null) {
                $this->addFeatures($request, "features", $category_id);
            }
            return redirect()->route("category.index")->with("success", "The category was successfully registered !!");
        } else {
            return back()->with("error", "The group does not exist OR is not selected !!");
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
        $name = Category::where("name", $request['name'])->count();
        if ($countGroup === 1) {
            $category->update($data);
            return redirect()->route("category.index")->with("success", "The category has been successfully modified !!");
        } else {
            return back()->with("error", "The group does not exist OR is not selected !!");
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

    public function validator()
    {
        return request()->validate([
            "groupe_id" => "required",
            "name" => "required",
            "icon" => "required",
            "price" => "required",
        ]);
    }

    public function addFeatures($request, $valuesFeatues, $category_id)
    {
        foreach ($request[$valuesFeatues] as $item) {
            if (in_array($item['type'], $this->Type())) {
                Feature::firstOrCreate([
                    "name"=>$item['name'],
                    "type"=>$item['type'],
                    "category_id"=>$category_id
                ]);
            } else {
                return back()->with("error", "Type of the information " . $item["name"] . "is not defined");
            }
        }
    }

    private function Type()
    {
        return ["text", "check", "number", "file"];
    }
}
