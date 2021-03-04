<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupe = Groupe::all();
        return view("admin.groupe.index", compact("groupe"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.groupe.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = request()->validate([
            "name" => "required",
            "icon" => "required",
            "color" => "required",
        ]);
        Groupe::firstOrCreate($request);
        return redirect()->route("group.index")->with("success", "Le groupe a ete enregistere avec succe !!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show(Groupe $groupe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit($groupe)
    {
        $groupe = Groupe::findOrFail($groupe);
        return view("admin.groupe.edit", compact("groupe"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groupe $groupe)
    {
        $request = request()->validate([
            "name" => "required",
            "icon" => "required",
            "color" => "required",
        ]);
        // $count = Groupe::where("name",$request['name'])->count();
        $groupe->update($request);
        return redirect()->route("group.index")->with("success", "Le groupe a ete modifier avec succe !!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy($groupe)
    {
        $groupe = Groupe::findOrFail($groupe);
        $groupe->delete();
        return redirect()->route("group.index")->with("success", "Le groupe a ete supprime avec succe !!!!");
    }
}
