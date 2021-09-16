<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ShoppingCart extends Component
{
    public function getFavorite(Request $request, $id_Ad, $image, $title,$price)
    {
        // dd(json_decode(Cookie::get("ushakiki-favorite"),true));
        $data = json_decode(Cookie::get("ushakiki-favorite"),true) ?? [];
        $data[$id_Ad] = [
            "id" => $id_Ad,
            "image" => $image,
            "title" => $title,
            "price" => $price,
        ];
        $time = (60 * 60 * 24 * 30);
        Cookie::queue(Cookie::make("ushakiki-favorite", json_encode($data), $time));
    }
    
    public function render()
    {
        $data = json_decode(Cookie::get("ushakiki-favorite"),true)??[];
        return view('livewire.shopping-cart',compact("data"));
    }
}
