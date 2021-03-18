<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view("admin.groupe.index", compact("groupe", "categories"));
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
        $request = $this->validator();
        $groupeCount = Groupe::where("name", $request['name'])->count();
        if ($groupeCount === 0) {
            Groupe::firstOrCreate($request);
            return redirect()->route("group.index")->with("success", "The group has been successfully registered!!!!");
        } else {
            return back()->with("error", "The group name is already exist !!");
        }
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
    public function update(Request $request, $groupe)
    {

        $request = $this->validator();
        $groupe = Groupe::findOrfail($groupe);
        $groupecount = Groupe::where("name", $request['name'])
            ->where("id", "!=", $groupe->id)
            ->count();
        if ($groupecount === 0) {
            $groupe->update($request);
            return back()->with("success", "The group has been successfully edit !!!!");
        }else{
            return back()->with("error","The group name already exist !!!!");
        }

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
        return redirect()->route("group.index")->with("success", "The group has been deleted successfully !!!!");
    }

    private function validator()
    {
        return request()->validate([
            "name" => "required",
            "icon" => "required",
            "price" => "required",
            "color" => "required",
        ]);
    }
}
