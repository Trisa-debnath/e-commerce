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
                        {{-- Price & Discount --}}
              <p class="pcc_price">
                 @if ($product->discounted_price > 0)
                 <small style="color:#dc3545;"> 
                  {{ number_format($product->discount_percent) }}% OFF 
                      </small></br>
                      <p class="fw-bold fs-5">
                 Price :
               <span style="text-decoration:line-through; color:#0ea3c9; font-size:14px; margin:0;">
                 ${{ $product->regular_price }}
                </span>
                 <span style="color:#6f42c1; font-size:16px; font-weight:600; margin-bottom:5px;">
               ${{ $product->discounted_price }}  </span>
                      </p>

         @else
              <p style="color:#218838; font-size:16px; font-weight:600; margin:0;">
                  Price: ${{ $product->regular_price }}
                </p>
               @endif



              </p>
              
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
