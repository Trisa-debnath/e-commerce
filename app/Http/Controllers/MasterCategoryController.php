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

 public function editcategore($id)
    {
        $editcat = Category::find($id);
        return view('admin.category.edit', compact('editcat'));
    }


      public function deletecategore($id)
    {
        $catd = Category::find ($id);
       $catd -> delete();
        return redirect()-> route('category.manage')->with('error','category Deleted successfully.');
    }


        public function upcategore(Request $request, $id)
    {
        Category::where('id', $id)->update([
            'category_name'=> $request->category_name
         
        ]);
     
 return redirect()-> route('category.manage')->with('success','Category update successfully.');
    }

}
