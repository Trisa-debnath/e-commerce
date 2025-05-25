<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public  function index(){
        return view('admin.admin');
    }
public  function seeting(){
        return view('admin.seeting');
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
