@extends('layouts.user')
@section('home')


<h3>Order Summary</h3>
@if(count($cart) > 0)
    <ul class="list-group mb-3">
        @foreach($cart as $id => $item)
            <li class="list-group-item d-flex justify-content-between">
                {{ $item['name'] }} × {{ $item['quantity'] }}
                <span>${{ $item['quantity'] * $item['price'] }}</span>
            </li>
        @endforeach
    </ul>
    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        
         <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="Phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

       
  {{-- Payment Method --}}
    <div class="mb-3">
        <label>Select Payment Method</label><br>
        <input type="radio" name="payment_method" value="cod" checked> Cash on Delivery <br>
        <input type="radio" name="payment_method" value="card"> Pay Using Card
    </div>

        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>
@else
    <p>Your cart is empty!</p>
@endif

@endsection