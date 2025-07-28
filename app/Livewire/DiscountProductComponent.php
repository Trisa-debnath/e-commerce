<?php

namespace App\Livewire;

use Livewire\Component;
//use App\Models\Product;

class DiscountProductComponent extends Component
{
    public function render()
    {

//$discountedProducts = Product::whereNotNull('discount_price')->take(6)->get();
        return view('livewire.discount-product-component');
        
        //[ 'products' => $discountedProducts ]);

         

       
    }
}
