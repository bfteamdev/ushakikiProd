<?php

namespace App\Http\Controllers\Site;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Commune;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Annonces_feature;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use League\HTMLToMarkdown\HtmlConverter;

class createAds extends Controller
{
    private $howMultipliy = [
        "100" => 7,
        "150" => 15,
        "250" => 30
    ];
    public function __construct()
    {
        $this->middleware("auth")->except(["showGroup"]);
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
        return [
            $category->where("id", $category->id)->with(["type", "features"])->firstOrFail(),
            "commune" => Commune::all(),
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
        $typeTrue = $request['type_id'] ? true : false;
        //Info ad
        $title = trim(htmlentities($request['title']));
        $price = trim(htmlentities($request['price']));
        $commune = trim(htmlentities($request['commune']));
        $zone = trim(htmlentities($request['zone']));
        //Description conversion
        $convertToMarkDown = new HtmlConverter(array('strip_tags' => true));
        //End-description conversion
        $description = $convertToMarkDown->convert(trim($request['description']));
        $expiredAt = Carbon::now()->addDays($request['expired_at']);
        //End info ad
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
                        "title" => $title,
                        "price" => $$price,
                        "commune" => $commune,
                        "zone" => $zone,
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                } else {
                    Annonce::create([
                        "category_id" => $request['category_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $title,
                        "price" => $price,
                        "commune" => $commune,
                        "zone" => $zone,
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                }
            } else {
                if ($typeTrue) {
                    Annonce::create([
                        "type_id" => $request['type_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $title,
                        "price" => $price,
                        "commune" => $commune,
                        "zone" => $zone,
                        "statu" => "inactive",
                        "description" => $description,
                        "expired_at" => $expiredAt
                    ]);
                } else {
                    Annonce::create([
                        "category_id" => $request['category_id'],
                        "user_id" => (int)Auth::user()->id,
                        "title" => $title,
                        "price" => $price,
                        "commune" => $commune,
                        "zone" => $zone,
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
                        "feature_id" => trim(htmlentities($items['feature_id'])),
                        "field_id" => trim(htmlentities($key)),
                        "value" => trim(htmlentities($value))
                    ]);
                }
            }
            foreach ($request['imagesAds'] as $items) {
                $items = $items->store("AdsImages/" . $Ads_id, "public");
                Photo::create([
                    "annonce_id" => $Ads_id,
                    "name" => trim(htmlentities($items))
                ]);
            }
            DB::table('users')
                ->where("id", (int)Auth::user()->id)
                ->update($request['user']);
            if (in_array($request['expired_at'], $this->howMultipliy)) {
                $expiredAt = Carbon::now()->addDays($request['expired_at']);
                foreach ($this->howMultipliy as $key => $value) {
                    if ($value === (int)$request['expired_at']) {
                        $amount = (($group->price * $key) / 100);
                    }
                }
            } else {
                $expiredAt = Carbon::now()->addDays(7);
                $amount = $group->price;
            }
            Order::create([
                "orderReference" => "#" . random_int(10000, 99999),
                "user_id" => (int)Auth::user()->id,
                "annonce_id" => $Ads_id,
            ]);
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
                "title" => $title,
                "price" => $price,
                "commune" => $commune,
                "zone" => $zone,
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
        return view("website.viewDetail");
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
    private function returPriceForDays($group)
    {
        return [
            "7" => (($group->price * 100) / 100),
            "15" => (($group->price * 150) / 100),
            "30" => (($group->price * 250) / 100)
        ];
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
        $priceDays = $this->returPriceForDays($group);
        // $feature = Feature::where('category_id', 2)->get();
        return view('website.addMoreInfo', compact("category", "group", "priceDays"));
    }
}
