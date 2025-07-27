<div>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trisha's Shop – Products</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- FontAwesome (optional icons) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f5f5;
    }

    .product_card {
      border-radius: 15px;
      transition: all 0.3s ease;
      background-color: #fff;
      border: none;
      overflow: hidden;
    }

    .product_card:hover {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      transform: translateY(-6px);
    }

    .product_img {
      height: 260px;
      width: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .product_card:hover .product_img {
      transform: scale(1.05);
    }

    .product_card h5 {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 0.4rem;
    }

    .pcc_in a {
      color: #17a2b8;
      text-decoration: none;
      font-weight: 500;
    }

    .pcc_price {
      color: #28a745;
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    .btn-pink {
      background-color: #e91e63;
      color: #fff;
      border: none;
    }

    .btn-pink:hover {
      background-color: #d81b60;
      color: #fff;
    }

    .btn-outline-secondary:hover {
      background-color: #eee;
    }
  </style>
</head>

<body>
  <div class="py-5">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold text-uppercase" style="color:#e91e63;">Featured Products</h2>
      <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Red+Sneaker" class="product_img" alt="Product 1">
            <div class="card-body text-center d-flex flex-column">
              <h5>Red Sneaker</h5>
              <p class="pcc_in">In <a href="#">Sneakers</a></p>
              <p class="pcc_price">$520</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Blue+Shoe" class="product_img" alt="Product 2">
            <div class="card-body text-center d-flex flex-column">
              <h5>Blue Sports Shoe</h5>
              <p class="pcc_in">In <a href="#">Running</a></p>
              <p class="pcc_price">$460</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Black+Boot" class="product_img" alt="Product 3">
            <div class="card-body text-center d-flex flex-column">
              <h5>Black Leather Boot</h5>
              <p class="pcc_in">In <a href="#">Boots</a></p>
              <p class="pcc_price">$690</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Heels+Red" class="product_img" alt="Product 4">
            <div class="card-body text-center d-flex flex-column">
              <h5>Red Heels</h5>
              <p class="pcc_in">In <a href="#">Heels</a></p>
              <p class="pcc_price">$410</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Casual+White" class="product_img" alt="Product 5">
            <div class="card-body text-center d-flex flex-column">
              <h5>White Casual</h5>
              <p class="pcc_in">In <a href="#">Casual</a></p>
              <p class="pcc_price">$380</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6">
          <div class="card product_card h-100 shadow-sm">
            <img src="https://via.placeholder.com/400x260?text=Pink+Sneaker" class="product_img" alt="Product 6">
            <div class="card-body text-center d-flex flex-column">
              <h5>Pink Sneaker</h5>
              <p class="pcc_in">In <a href="#">Women</a></p>
              <p class="pcc_price">$499</p>
              <div class="mt-auto d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-pink">Add To Cart</button>
                <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</div>