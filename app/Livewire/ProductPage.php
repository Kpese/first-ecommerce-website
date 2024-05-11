<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{

    public $search;

    public function render()
    {
        $product = Product::latest()->where('title', 'like', "%{$this->search}%")->get();
        return view('livewire.product-page', compact('product'));
    }
}
