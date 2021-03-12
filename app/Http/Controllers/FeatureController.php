<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all();
        return view("admin.feature.index", compact("features"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $features = new Feature();
        return view("admin.feature.create", compact("features", "categories"));
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
        $categoryCount = Category::where("id", $request['category_id'])->count();
        $featuresCount = Feature::where("name", $request['name'])->count();
        if (in_array($request['type'], $this->Type())) {
            if ($categoryCount === 1) {
                if ($featuresCount === 0) {
                    Feature::firstOrCreate($data);
                    return redirect()->route("features.index")->with("success", "The feature is registered with successfull !!!");
                } else {
                    return back()->with("error", "The feature name alread exist !!!");
                }
            } else {
                return back()->with("error", "The category is not defined !!!");
            }
        } else {
            return back()->with("error", "The type info is not defined !!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        $categories = Category::all();
        return view("admin.feature.edit", compact("feature", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $this->validator();
        $categoryCount = Category::where("id", $request['category_id'])->count();
        $featuresCount = Feature::where("name", $request['name'])
            ->where("id", "!=", $feature->id)
            ->count();
        if (in_array($request['type'], $this->Type())) {
            if ($categoryCount === 1) {
                if ($featuresCount === 0) {
                    $feature->update($data);
                    return back()->with("success", "The feature is updated with successfull !!!");
                } else {
                    return back()->with("error", "The feature name alread exist !!!");
                }
            } else {
                return back()->with("error", "The category is not defined !!!");
            }
        } else {
            return back()->with("error", "The type info is not defined !!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $name = $feature->name;
        $feature->delete();
        return redirect()->route("features.index")->with("success", "The feature $name is delete with successfull !!!");
    }

    private function Type()
    {
        return ["text", "check", "number", "file"];
    }

    private function validator()
    {
        return request()->validate([
            "name" => "required",
            "category_id" => "required",
            "type" => "required"
        ]);
    }
}
