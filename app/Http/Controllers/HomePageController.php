<?php

namespace App\Http\Controllers;

use App\Models\HomePageSetting;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public  function index(){
   $homepagesetting = HomePageSetting::with([
    'discountedProduct.images',
    'featuredProduct1.images',
    'featuredProduct2.images'
])->first();
$sliderProducts = Product::with('images')->latest()->take(5)->get();
      return view('home.index', compact('homepagesetting', 'sliderProducts'));
    }



}
