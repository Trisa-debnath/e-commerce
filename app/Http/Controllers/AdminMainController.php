<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class AdminMainController extends Controller
{
    public  function index(){
        return view('admin.admin');
    }
public  function seeting(){
    $products = Product::all();
        return view('admin.seeting', compact('products'));
    }
    public  function manage_user(){
        return view('admin.manage.user');
    }
    public  function manage_stores(){
        return view('admin.manage.store');
    }
    public  function cart_history(){
        return view('admin.cart.history');
    }
    public  function order_history(){
        return view('admin.order.history');
    }



}
