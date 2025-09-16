<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\HomePageSetting;
use Livewire\Component;

class HomePageComponent extends Component
{
   public $selectedCategory = null;
    public $categories = [];
    public $globalDiscount = 0; //  define for using descount part 

    public function mount(): void
    {
        $this->categories = Category::all();
          // 🔥 Read admin discount setting
        $homepagesetting = \App\Models\HomePageSetting::first();
        $this->globalDiscount = $homepagesetting->discount_percent ?? 0;
    
    }

    public function filterByCategory($categoryId): void
    {
        $this->selectedCategory = $categoryId;
    }

      public function render()
    {
        $products = Product::with('images')
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->take(12)
            ->get();
             
      //  Discount calculation based on admin setting
        foreach ($products as $product) {
            $regular = $product->regular_price ?? 0;
            $percent = $this->globalDiscount;

            if ($regular > 0 && $percent > 0) {
                $product->discounted_price = intval($regular - ($regular * $percent / 100));
                $product->discount_percent = $percent;
            } else {
                $product->discounted_price = 0;
                $product->discount_percent = 0;
            }
        }

        
        return view('livewire.home-page-component', [
            'products' => $products,
            'categories' => $this->categories,
            'selectedCategory' => $this->selectedCategory,
        ]);
    }
}
