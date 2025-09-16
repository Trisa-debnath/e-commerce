<section id="product">

@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


  <div class="container py-5">
    <div class="row">

      <!-- 🏷️ Title -->
      <div class="col-12 text-center mb-4">
        <h5 class="mb-2">Discover Your Required Product</h5>
        <h2 class="fw-bold">From 267+ Different Vendors, 10+ Categories</h2>
      </div>

      <!-- 🔘 Filter Buttons -->
      <div class="col-12 mb-5 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2">
          <button wire:click="filterByCategory(null)" 
                  class="btn btn-outline-dark {{ $selectedCategory === null ? 'active' : '' }}">
            All product
          </button>

          @foreach ($categories as $category)
            <button wire:click="filterByCategory({{ $category->id }})" 
                    class="btn btn-outline-secondary {{ $selectedCategory === $category->id ? 'active' : '' }}">
              {{ $category->category_name }}
            </button>
          @endforeach
        </div>
      </div>

      <!--  Included the Cart Manager Livewire Component -->
     
      <!-- 🛍️ Products Grid -->
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
              <p class="pcc_price">

          {{-- Price & Discount --}}
          <span>
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
</span>


            

          
 {{-- Buttons --}}
 <div style="margin-top:15px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
 <!-- 🧠 This is add to cart component location -->
   @livewire('cart-manager-component', ['product' => $product], key($product->id))

   <a href="{{ route('products.viewdetails', $product->id) }}"   style="background:#007bff; color:#fff; text-decoration:none; border-radius:8px; padding:7px 14px; font-size:14px; transition:0.3s;">
                🔍 View Details
              </a>
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

    </div>
  </div>
</section>
