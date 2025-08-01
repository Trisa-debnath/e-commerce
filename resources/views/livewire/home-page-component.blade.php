<section id="product">
  <div class="container py-5">
    <div class="row">

      <!-- 🏷️ Title -->
      <div class="col-12 text-center mb-4">
        <h5 class="mb-2">Discover Your Required Product</h5>
        <h2 class="fw-bold">From 267+ Different Vendors, 30+ Categories</h2>
      </div>

      <!-- 🔘 Filter Buttons -->
      <div class="col-12 mb-5 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2">
          <button wire:click="filterByCategory(null)" 
                  class="btn btn-outline-dark {{ $selectedCategory === null ? 'active' : '' }}">
            All
          </button>

          @foreach ($categories as $category)
            <button wire:click="filterByCategory({{ $category->id }})" 
                    class="btn btn-outline-dark {{ $selectedCategory === $category->id ? 'active' : '' }}">
              {{ $category->category_name }}
            </button>
          @endforeach
        </div>
      </div>

      <!-- 🛍️ Products Grid -->
      @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card product_card h-100 shadow-sm">
            <img src="{{ asset('storage/products/' . ($product->images[0]->image ?? 'default.png')) }}" 
                 class="product_img" 
                 alt="{{ $product->name }}">

            <div class="card-body text-center d-flex flex-column">
              <h5>{{ $product->name }}</h5>
              <p class="pcc_in">In <a href="#">{{ $product->category->category_name ?? 'Uncategorized' }}</a></p>
              <p class="pcc_price">${{ $product->regular_price }}</p>

              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>
