@extends('layouts.user')
@section('home')

<style>
  .product_card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 30px;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .product_img {
    width: 100%;
    height: 250px;
    object-fit: contain;
    background-color: #f9f9f9;
    padding: 10px;
    border-bottom: 1px solid #f0f0f0;
    transition: transform 0.4s ease;
  }

  .product_card:hover .product_img {
    transform: scale(1.07);
  }

  .pc_content {
    padding: 20px;
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .pc_content h2 {
    font-size: 20px;
    color: #333;
    font-weight: 600;
    margin-bottom: 8px;
  }

  .pcc_in {
    color: #666;
    margin-bottom: 10px;
    font-size: 14px;
  }

  .pcc_in a {
    color: #007bff;
    text-decoration: none;
  }

  .pcc_price {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 15px;
  }

  .pcc_btns {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
  }

  .addtocart,
  .viewbtn {
    padding: 8px 14px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .addtocart {
    background-color: #28a745;
    color: #fff;
  }

  .addtocart:hover {
    background-color: #218838;
  }

  .viewbtn {
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
  }

  .viewbtn:hover {
    background-color: #0056b3;
  }

  .card-lg {
    background: #fff0f0;
    padding: 40px;
    border-radius: 20px;
  }

  .card-sm {
    border-radius: 15px;
    margin-bottom: 20px;
    padding: 20px;
  }

  .bg-purple {
    background-color: #6f42c1;
    color: #fff;
  }

  .bg-sky {
    background-color: #0dcaf0;
    color: #fff;
  }

  @media (max-width: 576px) {
    .product_img {
      height: 200px;
    }

    .pc_content h2 {
      font-size: 18px;
    }

    .addtocart,
    .viewbtn {
      font-size: 13px;
      padding: 6px 12px;
    }
  }
</style>

{{-- 🖼️ Full-Width Slideshow of 5 Product Images --}}
<div class="container-fluid px-0">
  <div id="productSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($sliderProducts as $key => $product)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
 <img 
 src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->img_path) : asset('home_asset/img/default.png') }}"
               alt="{{ $product->product_name ?? 'Default Product' }}"
               class="d-block w-100"
               style="height: 500px; object-fit: cover; margin: 0; padding: 0;">
        </div>
      @endforeach
    </div>

    {{-- Navigation arrows --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#productSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>


{{-- 🔥 Discount & Featured Products Section --}}
<section id="hero" class="py-5">
  <div class="container py-5">
    <h3 class="mb-4 text-center fw-bold text-uppercase text-primary">🔥 Discounted Products</h3>
    {{-- 🔥 Discounted Product Section --}}
    <div class="card border-0 shadow-lg p-4">
      <div class="row align-items-center">

        {{-- Left Side: Discount Text & Price & Add to Cart --}}
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
         
            {{-- descount --}}
           {{-- Discount % --}}
@if($homepagesetting->discount_percent && $homepagesetting->discount_percent > 0)
    <h2 class="display-3 fw-bold text-danger">
        {{ number_format($homepagesetting->discount_percent) }}%
    </h2>
    <h4 class="fw-bold text-dark">
        {{ $homepagesetting->discount_heading }}
    </h4>
      <h4 class="fw-bold text-dark">
        {{ $homepagesetting->$discountedProduct->product_name }}
    </h4>
@else
    <h2 class="display-3 fw-bold text-danger">
        0%
    </h2>
    <h4 class="fw-bold text-dark">
        {{ $homepagesetting->discount_heading ?? 'No Discount Available' }}
    </h4>
@endif

{{-- Price --}}
@if($homepagesetting->discountedProduct)
    <p class="fw-bold fs-5">
        @if($homepagesetting->discount_percent > 0)
            <span class="text-decoration-line-through text-muted">
                $ {{ $homepagesetting->discountedProduct->regular_price }}
            </span>
            <span class="ms-2 text-success">
                $ {{ $homepagesetting->discountedProduct->discounted_price }}
            </span>
        @else
            <span class="text-success">
                $ {{ $homepagesetting->discountedProduct->regular_price }}
            </span>
        @endif
    </p>
@endif


          {{-- Add to Cart Button --}}
          <button class="btn btn-success px-4 py-2 mt-2">
            🛒 Add to Cart
          </button>
        </div>

        {{-- Right Side: Product Image --}}
        <div class="col-md-6 text-center">
          @if($homepagesetting->discountedProduct && $homepagesetting->discountedProduct->images->first())
<img src="{{ asset('storage/' . $homepagesetting->discountedProduct->images->first()->img_path) }}"
alt="{{ $homepagesetting->discountedProduct->product_name ?? 'Discount Product' }}"
                 class="img-fluid rounded shadow"
                  style="height:450px; width:auto; object-fit:contain;
                 ">

          @else
            <img src="{{ asset('home_asset/img/default.png') }}"
                 alt="Default Product"
                 class="img-fluid rounded shadow"
                 style="height:450px; width:auto; object-fit:contain;">
          @endif
        </div>
      </div>
    </div>

    {{-- Right Side: Featured Products --}}
        <div class="row g-4">
@foreach(['featuredProduct1', 'featuredProduct2'] as $featured)
    <div class="col-md-6">
        <div class="card border-0 shadow h-100 text-center {{ $featured == 'featuredProduct1' ? 'bg-purple text-white' : 'bg-sky text-dark' }}">
            <div class="card-body p-3 p-lg-4 d-flex flex-column align-items-center">
  <img src="{{ optional(optional($homepagesetting->$featured)->images->first())->img_path 
     ? asset('storage/' . $homepagesetting->$featured->images->first()->img_path)
                              : asset('home_asset/img/default.png') }}"
                     alt="{{ $homepagesetting->$featured->product_name ?? 'Default Product' }}"
                     class="img-fluid rounded mb-3"  
                         style="height:450px; width:auto; object-fit:contain;">

                <h5 class="fw-bold">{{ $homepagesetting->$featured->product_name ?? 'No Product Name' }}</h5>
                
                <p class="mb-2">
                    <span class="text-decoration-line-through text-muted">
                       $ {{ $homepagesetting->$featured->regular_price ?? 0 }}
                    </span>
                    <span class="ms-2 text-success">
                       $ {{ $homepagesetting->$featured->discounted_price ?? $homepagesetting->$featured->regular_price ?? 0 }}
                    </span>
                </p>

                {{-- Add to Cart Button --}}
                <button class="btn btn-success px-3 py-2 mt-2">
                    🛒 Add to Cart

                </button>
            </div>
        </div>
    </div>
@endforeach
</div>



    </div>
  </div>
</section>


{{-- homePageComponent--}}
<div class="mt-4">
  @livewire('HomePageComponent')
</div>

{{-- 🆕 New Arrivals Section --}}
<div class="container py-5">
  <h3 class="mb-4 text-center fw-bold text-uppercase text-success">🛍️ New Arrivals</h3>
  <div class="row">
    @foreach ($products as $product)
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex">
        <div class="w-100 shadow-lg rounded-3 overflow-hidden" 
             style="background:#fff; transition:0.3s ease; display:flex; flex-direction:column;">
          
          {{-- Product Image --}}
          <img 
            src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->img_path) : asset('home_asset/img/default.png') }}" 
            alt="{{ $product->product_name }}" 
            style="width:100%; height:280px; object-fit:cover; background:#f9f9f9; transition:0.4s ease;"
            onmouseover="this.style.transform='scale(1.05)'" 
            onmouseout="this.style.transform='scale(1)'" 
          >

          {{-- Product Details --}}
          <div style="padding:18px; text-align:center; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <h2 style="font-size:20px; font-weight:600; color:#333; margin-bottom:8px;">
                {{ $product->product_name }}
              </h2>

              @if ($product->discounted_price && $product->discounted_price != 0)
                <p style="color:#6f42c1; font-size:16px; font-weight:600; margin-bottom:5px;">
                  Discount Price: {{ $product->discounted_price }}৳
                </p>
                <p style="text-decoration:line-through; color:#999; font-size:14px; margin:0;">
                  {{ $product->regular_price }}৳
                </p>
              @else
                <p style="color:#218838; font-size:16px; font-weight:600; margin:0;">
                  Price: {{ $product->regular_price }}৳
                </p>
              @endif
            </div>

            {{-- Buttons --}}
            <div style="margin-top:15px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
              <button class="btn btn-sm btn-pink" 
              style=" border:none; border-radius:8px; padding:7px 14px; font-size:14px; cursor:pointer; transition:0.3s;">
                
                🛒 Add To Cart

              </button>
              <a href="#" 
                 style="background:#007bff; color:#fff; text-decoration:none; border-radius:8px; padding:7px 14px; font-size:14px; transition:0.3s;">
                🔍 View Details
              </a>
            </div>
          </div>

        </div>
      </div>
    @endforeach
  </div>
</div>


@endsection
