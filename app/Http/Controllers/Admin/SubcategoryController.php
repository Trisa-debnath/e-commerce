<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
public  function index(){
        return view('admin.subcategory.create');
    }
    public  function manage(){
        return view('admin.subcategory.manage');
    }
}
