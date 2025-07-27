<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class HomePageComponent extends Component
{
    public function render()
    {
        return view('livewire.home-page-component', ['products' => Product::all()]);
    }
}
