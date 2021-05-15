<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllMsg extends Component
{
    public $searchUSer = '';
    public function render()
    {
        $usersSend = [];
        $usersSendMessages = Message::where("sender_id", "!=", Auth::user()->id)
            ->where("receiver_id", Auth::user()->id)
            ->get();
        foreach ($usersSendMessages as $user) {
            $usersSend[] = $user->sender_id;
        }
        $usersSend = array_unique($usersSend);
        $sendMsg = Message::whereIn("sender_id", $usersSend)->get();
        // $userSendMsg = User::whereIn("id", $usersSend)
        //     // ->orWhere("firstName", "like", "%{$this->searchUSer}%")
        //     // ->orWhere("lastName", "like", "%{$this->searchUSer}%")
        //     // ->orWhere("username", "like", "%{$this->searchUSer}%")
        //     ->get();
        $userSendMsg = User::where("firstName", "like", "%{$this->searchUSer}%")
            ->orWhere("lastName", "like", "%{$this->searchUSer}%")
            ->orWhere("username", "like", "%{$this->searchUSer}%")
            ->get();
        return view('livewire.all-msg', compact("userSendMsg","usersSend"));
    }
}
