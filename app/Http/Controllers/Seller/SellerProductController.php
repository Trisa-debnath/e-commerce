<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class SellerProductController extends Controller
{
     public  function index(){
        $authuserid = Auth::id();
        $stores = Store::where('user_id', $authuserid)->get();
        return view('seller.product.create', compact('stores'));
    }
       public  function manage(){
        $curentseller = Auth::id();
        $products = Product::where('seller_id',$curentseller)->get();
        return view('seller.product.manage', compact('products'));
    }

    public function store(Request $request){
        $request->validate([
             'product_name' => 'required|string|max:255',
        'description' => 'nullable|string',
      
        'sku' => 'nullable|string|max:100|unique:products,sku',
        'store_id' => 'required|exists:stores,id',
        'regular_price' => 'required|numeric|min:0',
        'discounted_price' => 'nullable|numeric|min:0|lte:regular_price',
        'tax_rate' => 'nullable|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'slug' => 'nullable|string|max:255|unique:products,slug',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:500',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:subcategories,id',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
             'description' => $request->description,
               'sku' => $request->sku,
               'seller_id' => Auth::id(),

                'store_id' => $request->store_id,  
            'regular_price' => $request->regular_price,
            'discounted_price' => $request->discounted_price,
            'tax_rate' => $request->tax_rate,
            'stock_quantity' => $request->stock_quantity,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'category_id' => $request->category_id,
             'subcategory_id' => $request->subcategory_id,

        ]);
        

  if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $imageName = $image->store('pdoduct_images','public');
                Productimage::create([
                    'product_id'=> $product->id,
                    'img_path' => $imageName,
                    'is_primary' => false

                ]);
            }
        }

        return redirect()->back()->with('success', 'Product created successfully!');

    }
}
