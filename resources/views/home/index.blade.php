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

  /* Zoom effect on hover */
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

  .addtocart, .viewbtn {
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

  @media (max-width: 576px) {
    .product_img {
      height: 200px;
    }

    .pc_content h2 {
      font-size: 18px;
    }

    .addtocart, .viewbtn {
      font-size: 13px;
      padding: 6px 12px;
    }
  }
</style>

<div class="container py-5">
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
