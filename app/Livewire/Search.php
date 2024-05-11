<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Url;

class Search extends Component
{
    #[Url()]
    public $search;

    public function render()
    {
        $order = Order::latest()->where('customer_name', 'like', "%{$this->search}%")->get();
        return view('livewire.search', compact('order'));
    }
}
