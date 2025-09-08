<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\HomePageSetting;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
   public function index()
{
   $homepagesetting = HomePageSetting::with([
    'discountedProduct.images',
    'featuredProduct1.images',
    'featuredProduct2.images'
])->first() ?? new HomePageSetting();
   
 // Default Products
  $products = Product::with('images')->take(3)->get();
    $homepagesetting->discountedProduct = $homepagesetting->discountedProduct ?? $products[0] ?? null;
    $homepagesetting->featuredProduct1  = $homepagesetting->featuredProduct1  ?? $products[1] ?? null;
    $homepagesetting->featuredProduct2  = $homepagesetting->featuredProduct2  ?? $products[2] ?? null;

  if ($homepagesetting->discountedProduct) {
    $reg = $homepagesetting->discountedProduct->regular_price ?? 0;
    $dis = $homepagesetting->discountedProduct->discounted_price ?? 0;

    if ($reg > 0 && $dis > 0 && $dis < $reg) {
        $homepagesetting->discount_percent = intval((($reg - $dis) / $reg) * 100);
        $homepagesetting->discount_heading = "Special Discount!";
    } else {
        $homepagesetting->discount_percent = 0;
        $homepagesetting->discount_heading = "No Discount Available";
    }
}

    //for new arrivals
$products = Product::with('images')->get();
   
//for slider
   $sliderProducts = Product::with('images')
    ->latest()
    ->take(5)
    ->get();

    return view('home.index', compact('homepagesetting', 'sliderProducts', 'products'));
}






public function showCategoryProducts($category_name){
    $category = category::where('category_name',$category_name)->firstOrFail();
    $products = Product::where('category_id',$category->id)->get();
    return view('home.categories',compact('category','products'));

}

}
