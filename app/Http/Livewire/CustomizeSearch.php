<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;
use Livewire\WithPagination;

class CustomizeSearch extends Component
{
    use WithPagination;
    public $tablePrice = [
        1000 . " - " . 10000,
        10000 . " - " . 50000,
        50000 . " - " . 100000,
        100000 . " - " . 500000,
        500000 . " - " . 1000000,
    ];
    public $products;
    public $name;
    public $q = "";
    protected $queryString = [
        "q" => ["except" => ""]
    ];
    public function render()
    {
        $annonce = Annonce::where('type_id', $this->products)->with(["category", "type"])
            ->where("title", "like", "%{$this->q}%")
            ->paginate(10);
        // $annonce = Annonce::where('type_id', $this->products)->get() ?
        //     Annonce::where('type_id', $this->products)
        //     ->where("title", "like", "%{$this->q}%")
        //     ->paginate(10)
        //     :
        //     Annonce::where('category_id', $this->products)
        //     ->where("title", "like", "%{$this->q}%")
        //     ->paginate(10);
        return view('livewire.customize-search', compact("annonce"));
    }
}
