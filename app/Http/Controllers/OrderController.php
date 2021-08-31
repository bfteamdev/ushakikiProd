<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group=Groupe::all();

        $order=Order::orderBy("id","desc")->paginate(15);
        return view('admin.order.index',compact('order','group'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // dd($order);
        return view('admin.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data=$request->validate([
            'status'=>'required'
        ]);
        $order->update([
            "status"=>$request->status
        ]);
        return back()->with("success","the status of order is update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function search()
    {
        $group=Groupe::all();
        $title=request('title');
        $status=request('status');
        $user=request('user');
        $category=request('category');
        $price=request('price');
     $clause=[];
     if($title!=null){
         $clause[] = ["title","like","%$title%"];
     }
     if( $status!=null){
        $clause[] = ["orders.status","like","%$status%"];
     }
     if($user !=null){
         $clause[]=["users.username","like","%$user%"];
     }
     if($price !=null){
         $clause[]=["annonces.price","=","$price"];
     }
     if($category !=null){
       $clause[]=["categories.id","like","$category"];
   }
    if(count($clause) == 0){
       return redirect()->back();
   }else{
       $search = Order::join("annonces","orders.annonce_id","=","annonces.id")
           ->join("categories", "annonces.category_id", "=", "categories.id")
        //    ->join("types","annonces.type_id","=","types.id")
           ->join('groupes','categories.groupe_id','=','groupes.id')
           ->join("users","orders.user_id", "=" ,"users.id")
           ->where($clause)
           ->select("users.username","users.firstName","users.lastName","annonces.*","categories.name","orders.*")
           ->paginate(15);
        //    dd($search);
   }
   return view('admin.order.search',compact('search','group'));

    }
}
