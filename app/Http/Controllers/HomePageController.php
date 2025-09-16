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
    $percent = $homepagesetting->discount_percent ?? 0;

    if ($reg > 0 && $percent > 0) {
        // calculate discount price
        $dis = intval($reg - (($percent / 100) * $reg));
        $homepagesetting->discountedProduct->discounted_price = $dis;
    } else {
        // if percent 0 , → discounted_price 0, only regular price show
        $homepagesetting->discountedProduct->discounted_price = 0;
        $homepagesetting->discount_percent = 0;
    }
}

//for featureproduct1

  if ($homepagesetting->featuredProduct1) {
    $reg = $homepagesetting->featuredProduct1->regular_price ?? 0;
    $percent = $homepagesetting->discount_percent ?? 0;

    if ($reg > 0 && $percent > 0) {
        // calculate discount price
        $dis = intval($reg - (($percent / 100) * $reg));
        $homepagesetting->featuredProduct1->discounted_price = $dis;
    } else {
        // if percent 0 , → discounted_price 0, only regular price show
        $homepagesetting->featuredProduct1->discounted_price = 0;
        $homepagesetting->discount_percent = 0;
    }
}

//for featureproduct2

  if ($homepagesetting->featuredProduct2) {
    $reg = $homepagesetting->featuredProduct2->regular_price ?? 0;
    $percent = $homepagesetting->discount_percent ?? 0;

    if ($reg > 0 && $percent > 0) {
        // calculate discount price
        $dis = intval($reg - (($percent / 100) * $reg));
        $homepagesetting->featuredProduct2->discounted_price = $dis;
    } else {
        // if percent 0 , → discounted_price 0, only regular price show
        $homepagesetting->featuredProduct2->discounted_price = 0;
        $homepagesetting->discount_percent = 0;
    }
}

    //for new arrivals
$products = Product::with('images')->get();

$globalPercent = $homepagesetting->discount_percent ?? 0;

foreach ($products as $product) {
    $reg = $product->regular_price ?? 0;
    $percent = $globalPercent; // use global discount

    if ($reg > 0 && $percent > 0) {
        $product->discounted_price = intval($reg - (($percent / 100) * $reg));
        $product->discount_percent = $percent;
    } else {
        $product->discounted_price = 0;
        $product->discount_percent = 0;
    }
}

   
//for slider
   $sliderProducts = Product::with('images')
    ->latest()
    ->take(5)
    ->get();

    return view('home.index', compact('homepagesetting', 'sliderProducts', 'products'));
}

public function showCategoryProducts($category_name){
    $category = category::where('category_name',$category_name)->firstOrFail();
    $products = Product::with('images', 'category')
        ->where('category_id', $category->id)
        ->get();

     // get global discount from home page settings
    $homepagesetting = HomePageSetting::first();
    $globalPercent = $homepagesetting->discount_percent ?? 0;

    // calculate discount for each product
    foreach ($products as $product) {
        $reg = $product->regular_price ?? 0;
        $percent = $globalPercent;

        if ($reg > 0 && $percent > 0) {
            $product->discounted_price = intval($reg - (($percent / 100) * $reg));
            $product->discount_percent = $percent;
        } else {
            $product->discounted_price = 0;
            $product->discount_percent = 0;
        }
    }
    return view('home.categories',compact('category','products'));

}

public function viewdetails($id){

// Product with images & category
    $product = Product::with('images', 'category')->findOrFail($id);

    // global discount
    $homepagesetting = HomePageSetting::first();
    $percent = $homepagesetting->discount_percent ?? 0;
    $reg = $product->regular_price ?? 0;

    if ($reg > 0 && $percent > 0) {
        $product->discounted_price = intval($reg - (($percent / 100) * $reg));
        $product->discount_percent = $percent;
    } else {
        $product->discounted_price = 0;
        $product->discount_percent = 0;
    }

  return view('home.viewdetails', compact('product'));   
}



}
