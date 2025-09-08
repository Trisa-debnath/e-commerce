@extends('layouts.user')
@section('home')


      

      @forelse ($products as $product)

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card product_card h-100 shadow-sm">
            <img src="{{ asset('storage/'.($product->images[0]?->img_path ?? 'default.png')) }}" 
                 class="product_img" 
                 alt="{{ $product->product_name }}">

            <div class="card-body text-center d-flex flex-column">
              <h5>{{ $product->product_name }}</h5>
              <p class="pcc_in">In <a href="#">
                {{ $product->category->category_name ?? 'Uncategorized' }}
              </a></p>
              <p class="pcc_price">${{ $product->regular_price }}</p>


              

              <div class="mt-auto">

 <!-- 🧠 This is add to cart component location -->
   @livewire('cart-manager-component', ['product' => $product], key($product->id))

  </div>
           

            </div>
          </div>
        </div>

   @empty
   <div class="col-12 text-center btn btn-outline-dark">
    <p >
      No product found for this category
    </p>

   </div>


      @endforelse

     
              



      
     


  


@endsection
