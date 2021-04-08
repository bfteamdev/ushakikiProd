<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeatureController extends Controller
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
        $features = Feature::select("*")->orderBy("id", "desc")->get();
        return view("admin.feature.index", compact("features"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Groupe::all();
        $features = new Feature();
        return view("admin.feature.create", compact("features", "group"));
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
        $featuresCount = Feature::where("title", $request['title'])
            ->where("category_id", "=", $request['category_id'])
            ->count();
        if ($categoryCount === 1) {
            if ($featuresCount === 0) {
                DB::beginTransaction();
                try {
                    Feature::firstOrCreate($data);
                    $feature_id = DB::getPdo()->lastInsertId();
                    if ($request['fields']) {
                        if ($this->fieldDoublons($request, "fields") === true) {
                            if ($request['fields'][0]['name'] !==  null) {
                                $this->addFeatures($request, "fields", $feature_id);
                            }
                        } else {
                            return back()->withInput()->with("error", "You repeated a feature name several times OR is empty !!!");
                        }
                    } else {
                        return back()->withInput()->with("error", "The feature name can't be not null !!!");
                    }
                    DB::commit();
                    return redirect()->route("features.index")->with("success", "The feature is registered with successfull !!!");
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return back()->withInput()->with("error", "Errorrrrrrr");
                }
            } else {
                return back()->withInput()->with("error", "The feature title alread exist on this category !!!");
            }
        } else {
            return back()->withInput()->with("error", "The category is not defined !!!");
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
        $group = Groupe::all();
        return view("admin.feature.edit", compact("feature", "group"));
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
            ->where("category_id", "=", $request['category_id'])
            ->where("id", "!=", $feature->id)
            ->count();
        if ($categoryCount === 1) {
            if ($featuresCount === 0) {
                DB::beginTransaction();
                try {
                    $feature->update($data);
                    $feature->field()->delete();
                    if ($request['fields']) {
                        if ($this->fieldDoublons($request, "fields") === true) {
                            if ($request['fields'][0]['name'] !==  null) {
                                $this->addFeatures($request, "fields", $feature->id);
                            }
                        } else {
                            return back()->withInput()->with("error", "You repeated a feature name several times OR is empty !!!");
                        }
                    } else {
                        return back()->withInput()->with("error", "The feature name can't be not null !!!");
                    }
                    DB::commit();
                    return back()->withInput()->with("success", "The feature is registered with successfull !!!");
                } catch (\Throwable $th) {
                    DB::rollBack();
                    return back()->withInput()->with("error", "Errorrrrrrr");
                }
                return back()->withInput()->with("success", "The feature is updated with successfull !!!");
            } else {
                return back()->withInput()->with("error", "The feature title alread exist on this category !!!");
            }
        } else {
            return back()->withInput()->with("error", "The category is not defined !!!");
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
                return back()->withInput()->with("error", "Type of the information " . $item["name"] . "is not defined");
            }
        }
    }

    private function validator()
    {
        return request()->validate([
            "title" => "required|string",
            "category_id" => "required|numeric",
            "displayOrder" => "required|numeric"
        ]);
    }

    private function Type()
    {
        return [
            "text",
            "check",
            "number",
            "file",
            "radio",
            "checkbox",
            "textarea",
        ];
    }

    public static function fieldDoublons($request, $Champ)
    {
        $countFeature = [];
        $isOkay = false;
        foreach ($request[$Champ] as $i => $v) {
            $countFeature[] = $request[$Champ][$i]['name'];
        }
        if (array_unique($countFeature) === $countFeature) {
            $isOkay = true;
        } else {
            $isOkay;
        }
        return $isOkay;
    }
}
