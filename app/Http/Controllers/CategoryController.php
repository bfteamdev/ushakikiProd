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
        // dd($request->all());
        $data = $this->validator();
        // dd($request['fields']);
        // dd($data);
        $countGroup = Groupe::where("id", $request['groupe_id'])->count();
        $categoryNameCount = Category::where("name", $request['name'])->count();
        $featureTitleOrderCount = Feature::where("title", $request['title'])->count();
        if ($countGroup === 1) {
            if ($categoryNameCount === 0) {
                Category::firstOrCreate([
                    "groupe_id" => $request['groupe_id'],
                    "name" => trim($request['name']),
                    "icon" => $request['icon']
                ]);
                $category_id = DB::getPdo()->lastInsertId();
                if ($featureTitleOrderCount === 0) {
                    Feature::firstOrCreate([
                        "category_id" => $category_id,
                        "title" => $request['title'],
                        "displayOrder" => $request['displayOrder']
                    ]);
                }
                $feature_id = DB::getPdo()->lastInsertId();
                if ($request['fields'][0]["name"] !== null) {
                    $this->addFeatures($request, "fields", $feature_id);
                }
                return redirect()->route("category.index")->with("success", "The category was successfully registered !!");
            } else {
                return back()->with("error", "The name of this category is already exist !!");
            }
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
        $id = $category->groupe_id;
        $feature = Feature::class;
        $feature_id = Feature::where("category_id", $category->id)->get();
        $countGroup = Groupe::where("id", $request['groupe_id'])->count();
        $categoryNameCount = Category::where("name", trim($request['name']))
            ->where("id", "!=", $category->id)
            ->count();
        // dd($categoryNameCount);
        $featureTitleOrderCount = Feature::where("title", $request['title'])->count();
        if ($countGroup === 1) {
            if ($categoryNameCount === 0) {
                $category->features()->delete();
                if ($featureTitleOrderCount === 0) {
                    Feature::firstOrCreate([
                        "category_id" => $category->id,
                        "title" => $request['title'],
                        "displayOrder" => $request['displayOrder']
                    ]);
                }
                if ($request['fields'][0]["name"] !== null) {
                    foreach ($feature_id as $x) {
                        $this->addFeatures($request, "fields", $x->id);
                    }
                }
                $category->update($data);
                return back()->with("success", "The category was successfully registered !!");
            } else {
                return back()->with("error", "The name of this category is already exist !!");
            }
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
            "title" => "required",
            "displayOrder" => "required",
        ]);
    }

    private function addFeatures($request, $valuesFeatues, $feature_id)
    {
        foreach ($request[$valuesFeatues] as $item) {
            if (in_array($item['type'], $this->Type())) {
                Field::firstOrCreate([
                    "feature_id" => $feature_id,
                    "name" => $item['name'],
                    "type" => $item['type'],
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
