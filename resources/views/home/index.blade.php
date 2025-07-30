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

{{-- 🔥 Flat Discount Section --}}
<section id="hero">
  <div class="container py-5">
    <div class="row align-items-center">

      {{-- Left Side --}}
      <div class="col-lg-7">
        <div class="card-lg mb-4 mb-lg-0">
          <h2 class="display-3 text-danger fw-bold">

           {{ number_format($homepagesetting->discount_percent) }}%
          </h2>
          <h4 class="text-dark">{{($homepagesetting->discount_heading)}}</h4>
          <p>Because of store opening carnival, Eclipse providing a huge discounted sell!</p>

          <div class="float-item mt-4">
            <img src="{{ asset('home_asset/img/shoe.png') }}" alt="Discount Product" style="width: 100px;">
          </div>
        </div>
      </div>

      {{-- Right Side --}}
      <div class="col-lg-5">
        <div class="card-sm bg-purple text-white mb-3">
          <div class="product">
            <img src="{{ asset('home_asset/img/beanbag.png') }}" alt="Bean Bag" style="width: 100%;">
          </div>
          <div class="mt-3">
            <h2 class="text-white">{{($homepagesetting->featuredProduct1->product_name)}}</h2>
            <p>{{($homepagesetting->featuredProduct1->regular_price)}}</p>
          </div>
        </div>

        <div class="card-sm bg-sky text-center">
          <h2>{{($homepagesetting->featuredProduct2->product_name)}}</h2>
          <p>{{($homepagesetting->featuredProduct2->regular_price)}}</p>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- 🆕 New Arrivals Section --}}
<div class="container py-5">
  <h3 class="mb-4 text-center fw-bold text-uppercase text-success">🛍️ New Arrivals</h3>
  <div class="row">
    @for ($i = 0; $i < 6; $i++)
      <div class="col-lg-4 col-md-6 col-sm-12 d-flex">
        <div class="product_card w-100">
          <img src="{{ asset('home_asset/img/shoe.png') }}" alt="Shoe Image" class="product_img">
          <div class="pc_content">
            <div>
              <h2>Xion Shoe</h2>
              <p class="pcc_in">In <a href="#">Shoe</a></p>
              <p class="pcc_price">$502</p>
            </div>
            <div class="pcc_btns">
              <button class="addtocart">Add To Cart</button>
              <a href="#" class="viewbtn">View Details</a>
            </div>
          </div>
        </div>
      </div>
    @endfor
  </div>
</div>

@endsection
