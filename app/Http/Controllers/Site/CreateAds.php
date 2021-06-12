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
use App\Models\Commune;
use App\Models\Photo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\HTMLToMarkdown\HtmlConverter;

class createAds extends Controller
{
    private $howMultipliy = [];
    public function __construct()
    {
        $this->middleware("auth")->except(["showGroup"]);
        $this->howMultipliy = [
            "1" => 7,
            "2" => 15,
            "3" => 30
        ];
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
        return view('website.createAdd', compact('group'));
    }

    public function showCategory(Category $category)
    {
        $subCategory = Type::where('category_id', $category->id)->get();
        $feature = Feature::where('category_id', $category->id)->get();
        foreach ($feature as $item) {
            $item->field;
        }
        $commune = Commune::all();
        return [
            "subCategory" => $subCategory,
            "feature" => $feature,
            "commune" => $commune,
        ];
    }
    public function showFeature(Category $category)
    {
        $feature = Feature::where('category_id', $category->id)->get();
        $fields = [];
        foreach ($feature as $item) {
            $fields[] = $item->field;
        }
        return [
            "feature" => $feature,
        ];
    }

    public function storeAds(Request $request)
    {
        // dd(Auth::user()->id);
        // dd($request->all());
        $expiredAt = Carbon::now()->addDays($request['expired_at']);
        $typeTrue = $request['type_id'] ? true : false;
        $convertToMarkDown = new HtmlConverter(array('strip_tags' => true));
        $description = $convertToMarkDown->convert(trim($request['description']));
        $group = Groupe::findOrFail($request->group_id);
        $typeName = null;
        $categoryName = null;
        if ($typeTrue) {
            $typeName = Type::findOrFail($request['type_id']);
        } else {
            $categoryName = Category::findOrFail($request['category_id']);
        }
        $amount = 0;

        DB::beginTransaction();
        try {
            if ($group->price <= 0) {
                if ($typeTrue) {
                    Annonce::create([
                        "type_id" => $request['type_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $request['title'],
                        "price" => $request['price'],
                        "commune" => $request['commune'],
                        "zone" => $request['zone'],
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                } else {
                    Annonce::create([
                        "category_id" => $request['category_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $request['title'],
                        "price" => $request['price'],
                        "commune" => $request['commune'],
                        "zone" => $request['zone'],
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                }
            } else {
                if ($typeTrue) {
                    Annonce::create([
                        "type_id" => $request['type_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $request['title'],
                        "price" => $request['price'],
                        "commune" => $request['commune'],
                        "zone" => $request['zone'],
                        "statu" => "inactive",
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                } else {
                    Annonce::create([
                        "category_id" => $request['category_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $request['title'],
                        "price" => $request['price'],
                        "commune" => $request['commune'],
                        "zone" => $request['zone'],
                        "statu" => "inactive",
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                }
            }
            $Ads_id = DB::getPdo()->lastInsertId();
            foreach ($request['feature'] as $items) {
                foreach ($items['value'] as $key => $value) {
                    Annonces_feature::create([
                        "annonce_id" => $Ads_id,
                        "feature_id" => $items['feature_id'],
                        "field_id" => $key,
                        "value" => $value
                    ]);
                }
            }
            foreach ($request['imagesAds'] as $items) {
                $items = $items->store("AdsImages/" . $Ads_id, "public");
                Photo::create([
                    "annonce_id" => $Ads_id,
                    "name" => $items
                ]);
            }
            DB::table('users')
                ->where("id", (int)Auth::user()->id)
                ->update($request['user']);
            if (in_array($request['expired_at'], $this->howMultipliy)) {
                $expiredAt = Carbon::now()->addDays($request['expired_at']);
                foreach ($this->howMultipliy as $key => $value) {
                    if ($value === (int)$request['expired_at']) {
                        $amount = ($group->price * $key);
                    }
                }
            } else {
                $expiredAt = Carbon::now()->addDays(7);
                $amount = $group->price;
            }
            $client_token =  $request['title'] . '_' . (int)Auth::user()->id . '_' . $Ads_id . '_' . $expiredAt . '_' . $description;
            $client_token_encode = base64_encode($client_token);
            $return_url = "http://localhost:8000/home/my-ads";
            $request->session()->put("adsInfo", [
                "user_id" => [
                    "nom" => strtoupper(Auth::user()->firstName),
                    "prenom" => Auth::user()->lastName,
                ],
                "type" => $typeName,
                "category" => $categoryName,
                "title" => $request['title'],
                "price" => $request['price'],
                "commune" => $request['commune'],
                "zone" => $request['zone'],
                "startDate" => Carbon::now(),
                "endDate" => $expiredAt,
                "amount" => $amount,
                "client_token" => $client_token,
                "client_token_encode" => $client_token_encode,
                "return_url" => $return_url,
            ]);
            DB::commit();
            return redirect()->route('ad.viewDetail');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with("error", "Une erreur est survenue lors du post d'annonce veillerz reassayez !!!");
        }
    }
    public function viewDetail()
    {
        return view("site.viewDetail");
    }
    public function confirmcommande(Request $data)
    {

        $status = $data->input()['status'];
        $amount = $data->input()['amount'];
        //$currency = $data->input()['currency'];
        $client_token_encode = $data->input()['client_token'];
        $client_token = base64_decode($client_token_encode);
        $client_token_expl = explode("_", $client_token);


        if ($status == "success") {
            $update = DB::update('update annonces set statu = ?', ["status_order"]);
        } else {
            file_put_contents(__DIR__ . '/assurancelogs.txt', "erreur", FILE_APPEND);
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
        return view('website.addMoreInfo', compact("category", "group"));
    }
}
