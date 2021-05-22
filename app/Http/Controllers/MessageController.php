<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    private $msg = [];

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
        //
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
    public function store(Request $request, $idReceiver)
    {
        $message = trim(htmlentities($request->message));
        $idReceiverExist = User::where("id", $idReceiver)->count();
        if (Auth::check()) {
            if ($idReceiverExist === 1) {
                Message::create([
                    "sender_id" => Auth::user()->id,
                    "receiver_id" => (int)$idReceiver,
                    "message" => $message,
                ]);
                $data = Message::where("sender_id", Auth::user()->id)
                ->where("receiver_id", $idReceiver)
                ->get();
                return json_encode(["success",$data]);
            } else {
                return json_encode(["error", "Il a un proble veillez le contactez par son numero <b>" . Auth::user()->phone . "</b>"]);
            }
        } else {
            return json_encode(["redirect", route('login.user')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
