<?php

namespace App\Http\Controllers;

use App\Events\ClientRegistedEvent;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view("admin.client.index", compact("client"));
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
                if ($data['profil'] !== null) {
                    $data['profil'] = $data['profil']->store("profil", "public");
                }
                $data['password'] = Hash::make($data['password']);
                $client = Client::firstOrCreate($data);
                event(new ClientRegistedEvent($client));
                return redirect()->route("client.index")->with("success", "The client was successfully registered!!!");
            } else {
                return back()->with("error", "The email username has already been used by another user");
            }
        } else {
            return back()->with("error", "The email address has already been used by another user");
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
        return view("admin.client.show", compact("client"));
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
        $data = $this->validator2();
        // dd($data);
        $countEmail = Client::where("email", $request['email'])->where("id", '!=', $client->id)->count();
        $countUsername = Client::where("username", $request['username'])->where("id", '!=', $client->id)->count();
        if ($countEmail !== 1) {
            if ($countUsername !== 1) {
                    // $data['profil'] = $data['profil']->store("profil", "public");
                
                $client->update($data);
                return back()->with("success", "The client has been updated successfully!!!");
            } else {
                return back()->with("error", "The email username has already been used by another user");
            }
        } else {
            return back()->with("error", "The email address has already been used by another user");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("client.index")->with("success", "The client was successfully deleted !!!");
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
            "status" => "",
            "profil" => ""
        ]);
    }

    public function validator2()
    {
        return request()->validate([
            "firstName" => "required",
            "lastName" => "required",
            "username" => "required",
            "email" => "required|email",
            "phone" => "required",
            "town" => "",
            "status" => ""
        ]);
    }
}
