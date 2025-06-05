<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
    

       public function storesubcategore(Request $request)
    {
           $validate = $request->validate(['subcategory_name'=>'required|unique:subcategories,subcategory_name',
            'category_id'=>'required|exists:categories,id',
            
        ]);
        
       $subcat = new Subcategory();
       $subcat->subcategory_name = $request ->subcategory_name;
        $subcat->category_id = $request ->category_id;
        $subcat->save();

        
       return redirect()->back()->with('success',  $subcat->subcategory_name." added Successfully.");
    }


 public function editsubcategore($id)
    {
        $editsubcat = Subcategory::find($id);
        $categorys = Category::all();

        return view('admin.subcategory.edit', compact('editsubcat','categorys'));
    }

      public function deletesubcategore($id)
    {
        $subcatd = Subcategory::find ($id);
       $subcatd -> delete();
        return redirect()-> route('subcategory.manage')->with('error','subcategory Deleted successfully.');
    }
     
   public function upsubcategore(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'category_id'=>'required|exists:categories,id'
        ]);

        $subcategory = Subcategory::find($id);

        if ($request->subcategory_name ==  $subcategory ->subcategory_name) {
            return redirect()->back()
                ->withErrors(['subcategory_name' => 'You did not change the subcategory name.']);
        }
else
         $subcategory ->subcategory_name = $request->subcategory_name;
         $subcategory ->category_id = $request->category_id;
         $subcategory ->save();

        return redirect()->route('subcategory.manage')
            ->with('success', 'Sub Category updated successfully.');
    }






}
