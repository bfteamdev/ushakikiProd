<?php

namespace App\Http\Controllers\Site;

use App\Models\Type;
use App\Models\Groupe;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Annonces_feature;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class createAds extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
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
    
    public function showCategory(Category $category)
    {
        $subCategory = Type::where('category_id', $category->id)->get();
        $feature = Feature::where('category_id', $category->id)->get();
        foreach($feature as $item){
            $item->field;
        }
        return [
            "subCategory"=> $subCategory,
            "feature"=> $feature,
        ];
    }
    public function showFeature(Category $category)
    {
        $feature = Feature::where('category_id', $category->id)->get();
        $fields = [];
        foreach($feature as $item){
            $fields[] = $item->field;
        }
        return [
            "feature"=>$feature,
        ];
    }
    
    public function storeAds(Request $request){
        // dd(Auth::user()->id);
        // dd($request->all());
        DB::beginTransaction();
        try {
            Annonce::create([
                "type_id"=>$request['type_id'],
                "user_id"=> (int)Auth::user()->id,
                "title"=>$request['title'],
                "price"=>$request['price'],
                "commune"=>$request['commune'],
                "zone"=>$request['zone'],
                "description"=>$request['description']
            ]);
            $Ads_id = DB::getPdo()->lastInsertId();
            foreach ($request['feature'] as $items) {
                foreach ($items['value'] as $item) {
                    Annonces_feature::create([
                        "annonce_id" => $Ads_id,
                        "feature_id" => $items['feature_id'],
                        "value" => $item
                    ]);
                }
            }
            foreach ($request['imagesAds'] as $items) {
                $items = $items->store("AdsImages/".$Ads_id,"public");
                Photo::create([
                    "annonce_id" => $Ads_id,
                    "name" => $items
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    /**
     * @param Groupe $groupe
     * Display a listing of the resource they passed in param.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddMoreInformation(Groupe $group)
    {
        $category = Category::where('groupe_id', $group->id)->get();
        // $feature = Feature::where('category_id', 2)->get();
        return view('site.addMoreInfo', compact("category"));
    }
}
