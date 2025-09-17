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
        <button type="submit" class="btn btn-success">Confirm Order</button>
    </form>
@else
    <p>Your cart is empty!</p>
@endif

@endsection