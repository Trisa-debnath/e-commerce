<div>
   <div class="dropdown me-2">
  <button class="btn btn-warning position-relative d-flex align-items-center dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-shopping-cart me-1"></i>
    <span>Cart</span>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      {{ session('cart_count', 0) }}
    </span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end p-3 shadow" style="min-width: 300px; max-height: 400px; overflow-y: auto;">
    @php
      $cart = session('cart', []);
      $total = 0;
    @endphp

    @if(count($cart) > 0)
      @foreach($cart as $key => $item)
        @php $total += $item['price'] * $item['quantity']; @endphp
        <li class="d-flex justify-content-between align-items-start mb-2 border-bottom pb-2">
          <div class="me-2">
            <strong>{{ $item['name'] }}</strong><br>
            <small>Qty: {{ $item['quantity'] }} × ${{ $item['price'] }}</small>
          </div>
          <form method="POST" action="#">
            @csrf
            <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
        </li>
      @endforeach
      <li class="mt-2 border-top pt-2">
        <strong>Total: ${{ number_format($total, 2) }}</strong>
      </li>
      <li class="mt-2 text-center">
        <a href="#" class="btn btn-sm btn-primary">View Cart</a>
      </li>
    @else
      <li class="text-center text-muted">Your cart is empty.</li>
    @endif
  </ul>
</div>



</div>
