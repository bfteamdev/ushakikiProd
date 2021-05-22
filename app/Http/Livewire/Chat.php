<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public $receiver_id;
    public $sender_id;

    public function render()
    {
        $message = Message::where("sender_id", $this->sender_id)
            ->where("receiver_id", $this->receiver_id)
            ->orWhere("sender_id", $this->receiver_id)
            ->orWhere("receiver_id", $this->sender_id )
            ->get();
        $postUserId = $this->receiver_id;
        return view('livewire.chat', compact("message", "postUserId"));
    }
}
