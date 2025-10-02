@extends('admin.layouts.layout')

@section('admin_page_title')
order history page
@endsection

@section('admin_layout')
    <div class="container mt-4">
    <h3 class="mb-4">Order History</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name ?? 'N/A' }}</td>
                                <td>${{ number_format($order->total, 2) }}</td>
                                <td>{{ ucfirst($order->payment_method) }}</td>
                                <td>
                                    @if($order->payment_status == 'paid')
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($order->status == 'completed')
                                        <span class="badge bg-primary">Completed</span>
                                    @elseif($order->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->format('d M, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
