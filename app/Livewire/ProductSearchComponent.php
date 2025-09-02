<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\product;
class ProductSearchComponent extends Component
{

 public $query = '';       
    public $products = [];    

    public function search()
    {
     
        if (!empty($this->query)) {
            $this->products = Product::where('product_name', 'like', '%' . $this->query . '%')->get();
        } else {
            $this->products = [];
        }
    }

    public function render()
    {
        return view('livewire.product-search-component');
    }
}
