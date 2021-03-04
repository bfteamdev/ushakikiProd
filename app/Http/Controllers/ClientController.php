<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.client.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        return view("admin.client.create", compact("client"));
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
        $countEmail = Client::where("email", $request['email'])->count();
        $countUsername = Client::where("phone", $request['username'])->count();
        if ($countEmail === 0) {
            if ($countUsername === 0) {
                Client::firstOrCreate($data);
                return redirect()->route("client.index")->with("success", "Le client a ete enregistre avec succe !!!");
            } else {
                return back()->with("error", "Le username a ete deja utilise par un autre");
            }
        } else {
            return back()->with("error", "L'adresse email a ete deja utilise par un autre");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function validator()
    {
        return request()->validate([
            "firstName" => "required",
            "lastName" => "required",
            "username" => "required",
            "password" => "required",
            "email" => "required|email",
            "phone" => "required",
            "organisation" => "",
            "town" => "",
            "status" => ""
        ]);
    }
}
