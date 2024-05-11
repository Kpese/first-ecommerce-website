<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;

class ProductSearch extends Component
{
    #[Url(as : 'q', history : true)]
    public $search;

    public function render()
    {
        $product = Product::latest()->where('title', 'like', "%{$this->search}%")->get();
        return view('livewire.product-search', compact('product'));
    }
}
