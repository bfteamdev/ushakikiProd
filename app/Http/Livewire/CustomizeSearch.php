<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

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
    public function render()
    {
        $price = strlen($this->trieByPrice) === 0 ?  [1, 999999999] : explode("-", $this->trieByPrice);
        return view(
            'livewire.customize-search',
            [
                "annonce" => Annonce::where('type_id', $this->products)
                    ->OrWhere('category_id', $this->products)
                    ->where("title", "like", "%{$this->q}%")
                    ->whereBetween("price", [(int)$price[0], (int)$price[1]])
                    ->with(["category", "type"])
                    ->paginate(10),
                "price"
            ]
        );
    }
}