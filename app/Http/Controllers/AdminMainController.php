<?php

namespace App\Http\Controllers;

use App\Models\HomePageSetting;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Order;

class AdminMainController extends Controller
{
    public  function index(){
        return view('admin.admin');
    }
public  function seeting(){
    $products = Product::all();
    $homepagesetting = HomePageSetting::first() ?? new HomePageSetting();
        return view('admin.seeting', compact('products', 'homepagesetting'));
    }

    public function homepage_settingupdate(Request $request){
        $request->validate([
    'discounted_product_id' => 'required|exists:products,id',
    'discount_percent' => 'required|numeric|min:0|max:100',
    'discount_heading' => 'required|string|max:255',
    'featured_product_1_id' => 'nullable|exists:products,id',
    'featured_product_2_id' => 'nullable|exists:products,id',
]);

$homepagesetting = HomePageSetting::first() ?? new HomePageSetting();
$homepagesetting->fill($request->all());
$homepagesetting->save();

 return redirect()-> route('admin.seeting')->with('success','Home Page Setting Update successfully.');

    }





    public  function manage_user(){
        return view('admin.manage.user');
    }
    public  function manage_stores(){
        return view('admin.manage.store');
    }
    public  function cart_history(){
         $orders = Order::latest()->paginate(10);
        return view('admin.cart.history', compact('orders'));
    }
    public  function order_history(){
        return view('admin.order.history');
    }



}
