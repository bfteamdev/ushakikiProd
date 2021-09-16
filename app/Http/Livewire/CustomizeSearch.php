<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cookie;

class CustomizeSearch extends Component
{
    use WithPagination;
    public $tablePrice = [
        100 => 10,
        1000 => 10,
        10000 => 10,
        100000 => 10,
        1000000  => 10,
    ];
    public $products;
    public $name;
    public $q = "";
    public $trieByPrice = "";
    protected $queryString = [
        "q" => ["except" => ""]
    ];
    //Favorite
    public $id_Ad;
    public $image;
    public $title;
    public $price;

    public function favorite(Request $request, $id_Ad, $image, $title,$price)
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
        $price = strlen($this->trieByPrice) === 0 ?  [1, 999999999] : explode("-", $this->trieByPrice);
        $annonce = Annonce::with(["category", "type", "viewPhoto"])
            ->OrWhere('category_id', $this->products)
            ->OrWhere('type_id', $this->products)
            ->whereBetween("price", [(int)$price[0], (int)$price[1]])
            ->where("title", "like", "%{$this->q}%")
            ->paginate(10);
        $sidebarAds = Annonce::limit(3)->get();
        return view('livewire.customize-search',  compact("annonce", "price", "sidebarAds"));
    }
}
