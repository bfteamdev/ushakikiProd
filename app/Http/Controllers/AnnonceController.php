<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Groupe;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Annonces_feature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexImmobilier()
    {
        $group=Groupe::all();
        $annonce=Annonce::join('categories','annonces.category_id','=', 'categories.id')
                            ->join('groupes','categories.groupe_id','=','groupes.id')
                            ->join('users','annonces.user_id','=','users.id')
                            ->where('groupes.name','=','immobiliers' )
                            ->select('annonces.*','users.username','categories.name')
                            ->orderBy('annonces.id','desc')
                            ->get();
        return view("admin.ads.immobilier.index",compact('annonce','group'));
    }
    public function showImmobilier($id)
    {
        $user=User::all();
        $immobilier=Annonce::findOrFail($id);
        $features=Annonces_feature::where('annonce_id',$immobilier->id)->get();
        // $photo=Photo::where('annonce_id',$immobilier->id)->get();
        $group=Groupe::all();
        // dd($immobilier);
        return view('admin.ads.immobilier.show',compact('immobilier','user','group','features'));

    }
    public function updateImmobilier(Request $request, $id)
    {
    //   dd($request->value);
        $data=$request->validate([
            'title'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'commune'=>'required',
            'zone'=>'required',
            'statu'=>'required'
        ]);
        $imo=Annonce::findOrFail($id);
        // dd($imo);
        $imo->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'statu'=>$request->statu,
            'description'=>$request->description,
            'commune'=>$request->commune,
            'zone'=>$request->zone
        ]);
        foreach ($request->value as $key => $item) {
                if (empty($item)) {
                    return back()->with('error', 'same field is not completed');
                } else {
                    $field=DB::table('annonces_features')
                        ->where('id', $key)
                        ->where('annonce_id', $imo->id)
                        ->update([
                        "value" => $item,
                ]);
                }
        }
        return back()->with('success','the ad is updated successfully');
    }
    public function destroyImmobilier($id)
    {

    }
    public function searchImmobilier()
    {
        $group=Groupe::all();
         $title=request('title');
         $stat=request('status');
         $user=request('user');
         $category=request('category');
         $date=request('created_at');
      $clause=[];
      if($title!=null){
          $clause[] = ["title","like","%$title%"];
      }
      if( $stat!=null){
         $clause[] = ["statu","like","%$stat%"];
      }
      if($user !=null){
          $clause[]=["users.username","like","%$user%"];
      }
      if($date !=null){
          $clause[]=["annonces.created_at","=","$date"];
      }
      if($category !=null){
        $clause[]=["categories.id","like","$category"];
    }
     if(count($clause) == 0){
        return redirect()->back();
    }else{
        $search = DB::table("annonces")
            ->join("categories", "annonces.category_id", "=", "categories.id")
            ->join('groupes','categories.groupe_id','=','groupes.id')
            ->join("users","annonces.user_id", "=" ,"users.id")
            ->where($clause)
            ->where('groupes.name','=','immobiliers' )
            ->select("users.username","annonces.*","categories.name")
            ->paginate(15);
            // dd($search);
    }
    return view('admin.ads.immobilier.search',compact('search','group'));

    }
    public function indexVoiture()
    {
        $group=Groupe::all();
        $annonce=Annonce::join('categories','annonces.category_id','=', 'categories.id')
                            ->join('groupes','categories.groupe_id','=','groupes.id')
                            ->join('users','annonces.user_id','=','users.id')
                            ->where('groupes.name','=','voiture' )
                            ->select('annonces.*','users.username','categories.name')
                            ->orderBy('annonces.id','desc')
                            ->get();
        return view("admin.ads.voiture.index",compact('annonce','group'));
    }
    public function showVoiture($id)
    {
        $user=User::all();
        $voiture=Annonce::findOrFail($id);
        $features=Annonces_feature::where('annonce_id',$voiture->id)->get();
        // dd($features);
        // $photo=Photo::where('annonce_id',$immobilier->id)->get();
        $group=Groupe::all();
        return view('admin.ads.voiture.show',compact('voiture','user','group','features'));

    }
    public function updateVoiture(Request $request, $id)
    {
        
        $data=$request->validate([
            'title'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'commune'=>'required',
            'zone'=>'required',
            'statu'=>'required'
        ]);
        $voiture=Annonce::findOrFail($id);
        $voiture->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'statu'=>$request->statu,
            'description'=>$request->description,
            'commune'=>$request->commune,
            'zone'=>$request->zone
        ]);
        foreach ($request->value as $key => $item) {
            if (empty($item)) {
                return back()->with('error', 'same field is not completed');
            } else {
                $field=DB::table('annonces_features')
                    ->where('id', $key)
                    ->where('annonce_id', $voiture->id)
                    ->update([
                    "value" => $item,
            ]);
            }
    }
        return back()->with('success','the ad is updated successfully');

    }
    public function destroyVoiture($id)
    {

    }
    public function searchVoiture()
    {
        $group=Groupe::all();
        $title=request('title');
        $status=request('status');
        $user=request('user');
        $category=request('category');
        $date=request('created_at');
     $clause=[];
     if($title!=null){
         $clause[] = ["title","like","%$title%"];
     }
     if( $status!=null){
        $clause[] = ["statu","like","%$status%"];
     }
     if($user !=null){
         $clause[]=["users.username","like","%$user%"];
     }
     if($date !=null){
         $clause[]=["annonces.created_at","=","$date"];
     }
     if($category !=null){
       $clause[]=["categories.id","like","$category"];
   }
    if(count($clause) == 0){
       return redirect()->back();
   }else{
       $searchVoiture = DB::table("annonces")
           ->join("categories", "annonces.category_id", "=", "categories.id")
           ->join('groupes','categories.groupe_id','=','groupes.id')
           ->join("users","annonces.user_id", "=" ,"users.id")
           ->where($clause)
           ->where('groupes.name','=','voiture' )
           ->select("users.username","annonces.*","categories.name")
           ->paginate(15);
        //    dd($search);
   }
   return view('admin.ads.voiture.search',compact('searchVoiture','group'));


    }
    public function indexTruc()
    {
        $group=Groupe::all();
        $annonce=Annonce::join('types','annonces.type_id','=','types.id')
                            ->join('categories','types.category_id','=', 'categories.id')
                            ->join('groupes','categories.groupe_id','=','groupes.id')
                            ->join('users','annonces.user_id','=','users.id')
                            ->where('groupes.name','=','Electronique' )
                            ->select('annonces.*','users.username','categories.name')
                            ->orderBy('annonces.id','desc')
                            ->get();   
        //  dd($annonce);                                      
        return view("admin.ads.truc.index",compact('annonce','group'));
    }
    public function showTruc($id)
    {
        $user=User::all();
        $truc=Annonce::findOrFail($id);
        $features=Annonces_feature::where('annonce_id',$truc->id)->get();
        $group=Groupe::all();
        return view('admin.ads.truc.show',compact('truc','user','group','features'));
    }
    public function updateTruc(Request $request, $id)
    {
        $data=$request->validate([
            'title'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'commune'=>'required',
            'zone'=>'required',
            'statu'=>'required'
        ]);
        $truc=Annonce::findOrFail($id);
        $truc->update([
            'title'=>$request->title,
            'type_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'statu'=>$request->statu,
            'description'=>$request->description,
            'commune'=>$request->commune,
            'zone'=>$request->zone
        ]);
         foreach ($request->value as $key => $item) {
            if (empty($item)) {
                return back()->with('error', 'same field is not completed');
            } else {
                $field=DB::table('annonces_features')
                    ->where('id', $key)
                    ->where('annonce_id', $truc->id)
                    ->update([
                    "value" => $item,
            ]);
            }
            }
        return back()->with('success','the ad is updated successfully');
    }
    public function destroyTruc($id)
    {

    }
    public function searchTruc()
    {
        $group=Groupe::all();
        $title=request('title');
        $status=request('status');
        $user=request('user');
        $category=request('category');
        $date=request('created_at');
     $clause=[];
     if($title!=null){
         $clause[] = ["title","like","%$title%"];
     }
     if( $status!=null){
        $clause[] = ["statu","like","%$status%"];
     }
     if($user !=null){
         $clause[]=["users.username","like","%$user%"];
     }
     if($date !=null){
         $clause[]=["annonces.created_at","=","$date"];
     }
     if($category !=null){
       $clause[]=["categories.id","like","$category"];
   }
    if(count($clause) == 0){
       return redirect()->back();
   }else{
       $searchTruc = DB::table("annonces")
          ->join('types',"annonces.type_id","=","types.id")
           ->join("categories", "types.category_id", "=", "categories.id")
           ->join('groupes','categories.groupe_id','=','groupes.id')
           ->join("users","annonces.user_id", "=" ,"users.id")
           ->where($clause)
           ->where('groupes.name','=','Electronique' )
           ->select("users.username","annonces.*","categories.name","types.name as name_type")
           ->paginate(15);
        //    dd($searchTruc);
   }
   return view('admin.ads.truc.search',compact('searchTruc','group'));
    }

    public function indexService()
    {
        $group=Groupe::all();
        $annonce=Annonce::join('categories','annonces.category_id','=', 'categories.id')
                            ->join('groupes','categories.groupe_id','=','groupes.id')
                            ->join('users','annonces.user_id','=','users.id')
                            ->where('groupes.name','=','service' )
                            ->select('annonces.*','users.username','categories.name')
                            ->orderBy('annonces.id','desc')
                            ->get();
        return view("admin.ads.services.index",compact('annonce','group'));
    }
    public function showService($id)
    {
        $user=User::all();
        $service=Annonce::findOrFail($id);
        // $photo=Photo::where('annonce_id',$immobilier->id)->get();
        $features=Annonces_feature::where('annonce_id',$service->id)->get();
        $group=Groupe::all();
        return view('admin.ads.services.show',compact('service','user','group','features'));

    }
    public function updateService(Request $request, $id)
    {
        $data=$request->validate([
            'title'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'commune'=>'required',
            'zone'=>'required',
            'statu'=>'required'
        ]);
        $service=Annonce::findOrFail($id);
        $service->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'statu'=>$request->statu,
            'description'=>$request->description,
            'commune'=>$request->commune,
            'zone'=>$request->zone
        ]);
         foreach ($request->value as $key => $item) {
            if (empty($item)) {
                return back()->with('error', 'same field is not completed');
            } else {
                $field=DB::table('annonces_features')
                    ->where('id', $key)
                    ->where('annonce_id', $service->id)
                    ->update([
                    "value" => $item,
            ]);
            }
            }
        return back()->with('success','the ad is updated successfully');

    }
    public function searchService()
    {
        $group=Groupe::all();
        $title=request('title');
        $status=request('status');
        $user=request('user');
        $category=request('category');
        $date=request('created_at');
     $clause=[];
     if($title!=null){
         $clause[] = ["title","like","%$title%"];
     }
     if( $status!=null){
        $clause[] = ["statu","like","%$status%"];
     }
     if($user !=null){
         $clause[]=["users.username","like","%$user%"];
     }
     if($date !=null){
         $clause[]=["annonces.created_at","=","$date"];
     }
     if($category !=null){
       $clause[]=["categories.id","like","$category"];
   }
    if(count($clause) == 0){
       return redirect()->back();
   }else{
       $searchService = DB::table("annonces")
           ->join("categories", "annonces.category_id", "=", "categories.id")
           ->join('groupes','categories.groupe_id','=','groupes.id')
           ->join("users","annonces.user_id", "=" ,"users.id")
           ->where($clause)
           ->where('groupes.name','=','service' )
           ->select("users.username","annonces.*","categories.name")
           ->paginate(15);
        //    dd($searchService);
   }
   return view('admin.ads.services.search',compact('searchService','group'));
    }
    public function destroyService($id)
    {

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Groupe::all();
        $category = Category::all();
        $subCategory = Type::all();
        return view("admin.ads.create", compact("group", "category", "subCategory"));
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
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        return view('admin.ads.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        //
    }
    //Dashboard clients
    public function annonceByUser()
    {
     $ad= Annonce::select("*")->where('user_id',Auth::user()->id )->orderBy('id','desc')->get();
    //  dd($ad);
        return view('website.dashbaord.myAd',compact('ad')); 
    }
    public function viewAnnonce($id)
    {
        $add=Annonce::findOrFail($id);
        $photo=Photo::where('annonce_id',$add->id)->get();
        $group=Groupe::all();
        $features=Annonces_feature::where('annonce_id',$add->id)->get();
        // dd($features);
        return view('website.dashbaord.viewAd',compact('add','group','photo','features'));
    }
    public function updateAd(Request $request, $id)
    {
        // dd($request->statu);
        $data=$request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'commune'=>'required',
            'zone'=>'required',
            'price'=>'required',
            'statu'=>'required'
        ]);
        $add=Annonce::findOrFail($id);
        $upAd=$add->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'commune'=>$request->commune,
            'zone'=>$request->zone,
            'price'=>$request->price,
            'statu'=>$request->statu,

        ]);
        foreach ($request->value as $key => $item) {
            if (empty($item)) {
                return back()->with('error', 'same field is not completed');
            } else {
                $field=DB::table('annonces_features')
                    ->where('id', $key)
                    ->where('annonce_id', $add->id)
                    ->update([
                    "value" => $item,
            ]);
            }
            }
        return back()->with('success','the ad is updated succussfuly');
    }
    public function viewRenew($id){
        $add=Annonce::findOrFail($id);
    //    dd($add->category->groupe->name);
        return view('website.dashbaord.renewAd',compact('add'));
    }
    public function searchAdByUser()
    {
        $q = request("q");
		$typeSearch = request("type");
		if (!empty($q) && !empty($typeSearch)) {
			$search = Annonce::where($typeSearch, "like", "%$q%")
                     ->where('user_id',Auth::user()->id)
                     ->paginate(10);
			return view( 'website.dashbaord.searchMyAd' , compact("search"));
		} else {
			return redirect()->route('dashboard.ads');
		}
    }
    
}
