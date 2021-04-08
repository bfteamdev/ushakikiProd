<?php

namespace App\Http\Controllers;

use App\Events\ClientRegistedEvent;
use App\User;
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

        $client = User::select("*")->orderBy("id", "desc")->get();

        return view("admin.client.index", compact("client"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new User();
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
        $countEmail = User::where("email", $request['email'])->count();
        $countUsername = User::where("phone", $request['username'])->count();
        if ($countEmail === 0) {
            if ($countUsername === 0) {
                if ($data['profil'] !== null) {
                    $data['profil'] = $data['profil']->store("profil", "public");
                }
                $data['password'] = Hash::make($data['password']);
                $client = User::firstOrCreate($data);
                event(new ClientRegistedEvent($client));
                return redirect()->route("client.index")->with("success", "The client was successfully registered!!!");
            } else {
                return back()->withInput()->with("error", "The email username has already been used by another user");
            }
        } else {
            return back()->withInput()->with("error", "The email address has already been used by another user");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        return view("admin.client.show", compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
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
    public function update(Request $request, User $client)
    {
        $data = $this->validator2();
        // dd($data);
        $countEmail = User::where("email", $request['email'])->where("id", '!=', $client->id)->count();
        $countUsername = User::where("username", $request['username'])->where("id", '!=', $client->id)->count();
        if ($countEmail !== 1) {
            if ($countUsername !== 1) {
                    // $data['profil'] = $data['profil']->store("profil", "public");
                
                $client->update($data);
                return back()->withInput()->with("success", "The client has been updated successfully!!!");
            } else {
                return back()->withInput()->with("error", "The email username has already been used by another user");
            }
        } else {
            return back()->withInput()->with("error", "The email address has already been used by another user");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
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
