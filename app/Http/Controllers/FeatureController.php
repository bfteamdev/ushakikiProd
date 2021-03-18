<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // dd($request->all());
        $data = $this->validator();
        // dd($data);
        $categoryCount = Category::where("id", $request['category_id'])->count();
        $featuresCount = Feature::where("title", $request['title'])->count();
        if ($categoryCount === 1) {
            if ($featuresCount === 0) {
                Feature::firstOrCreate($data);
                $feature_id = DB::getPdo()->lastInsertId();
                if ($request['fields'][0]['name'] !==  null) {
                    $this->addFeatures($request, "fields", $feature_id);
                }
                return redirect()->route("features.index")->with("success", "The feature is registered with successfull !!!");
            } else {
                return back()->with("error", "The feature name alread exist !!!");
            }
        } else {
            return back()->with("error", "The category is not defined !!!");
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
        $featuresCount = Feature::where("title", $request['title'])
            ->where("id", "!=", $feature->id)
            ->count();
        if ($categoryCount === 1) {
            if ($featuresCount === 0) {
                if ($request['fields'][0]['name'] !==  null) {
                    $feature->field()->delete();
                    $this->addFeatures($request, "fields", $feature->id);
                }
                $feature->update($data);
                return back()->with("success", "The feature is updated with successfull !!!");
            } else {
                return back()->with("error", "The feature name already exist !!!");
            }
        } else {
            return back()->with("error", "The category is not defined !!!");
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

    private function addFeatures($request, $valuesFeatues, $feature_id)
    {
        foreach ($request[$valuesFeatues] as $item) {
            if (in_array($item['type'], $this->Type())) {
                Field::create([
                    "feature_id" => $feature_id,
                    "name" => $item['name'],
                    "type" => $item['type'],
                ]);
            } else {
                return back()->with("error", "Type of the information " . $item["name"] . "is not defined");
            }
        }
    }

    private function validator()
    {
        return request()->validate([
            "title" => "required",
            "category_id" => "required",
            "displayOrder" => "required"
        ]);
    }
    
    private function Type()
    {
        return ["text", "check", "number", "file"];
    }
}
