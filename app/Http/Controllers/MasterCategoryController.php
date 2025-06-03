<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
       public function storecategore(Request $request)
    {
            $request->validate(['category_name'=>'required'
            
        ]);
        
       $cat = new category();
    $cat->category_name = $request ->category_name;
       $cat->save();
       return redirect()->route('category.create')->with('success', $cat->category_name." added Successfully.");
      

    }
}
