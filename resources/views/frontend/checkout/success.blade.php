@extends('layouts.frontend')

@section('title','Order Success')
@section('hero_title','Order Placed ✅')
@section('hero_subtitle','Thank you! Your order has been created successfully.')
@section('hero_action')
  <a class="px-4 btn btn-dark pill" href="{{ route('home') }}">
    <i class="bi bi-house me-1"></i> Back to Home
  </a>
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="mb-0 breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Order Success</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="p-3 card soft-card p-md-4">
    
    <div class="gap-2 d-flex justify-content-between align-items-start">
      <div>
        <h4 class="mb-1 fw-bold">Order #{{ $order->id }}</h4>
        <div class="text-muted small">
          Status: {{ ucfirst($order->status) }}
        </div>
      </div>
      <span class="border badge bg-light text-dark pill">Success</span>
    </div>

    <hr>

    <div class="row g-3">
      <div class="col-md-6">
        <div class="mb-2 fw-bold">Customer Information</div>
        <div class="text-muted">
          <div><strong>Name:</strong> {{ $order->full_name }}</div>
          <div><strong>Phone:</strong> {{ $order->phone }}</div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-2 fw-bold">Shipping Address</div>
        <div class="text-muted">
          {{ $order->address }}
        </div>
      </div>
    </div>

    @if($order->note)
      <hr>
      <div>
        <div class="mb-2 fw-bold">Order Note</div>
        <div class="text-muted">{{ $order->note }}</div>
      </div>
    @endif

    <hr>

    <div class="mb-2 fw-bold">Order Items</div>
    <div class="table-responsive">
      <table class="table mb-0 align-middle">
        <thead class="text-muted small">
          <tr>
            <th>Product</th>
            <th class="text-center">Price</th>
            <th class="text-center">Quantity</th>
            <th class="text-end">Total</th>
          </tr>
        </thead>
        <tbody>
          @forelse($order->orderItems as $item)
            <tr>
              <td class="fw-semibold">
                {{ $item->product->name ?? 'Product Deleted' }}
              </td>
              <td class="text-center">
                ${{ number_format($item->price, 2) }}
              </td>
              <td class="text-center">
                {{ $item->quantity }}
              </td>
              <td class="text-end fw-bold">
                ${{ number_format($item->price * $item->quantity, 2) }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-muted">No items found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <hr>

    <div class="d-flex justify-content-between">
      <span class="fw-bold">Grand Total</span>
      <span class="fw-bold fs-5">${{ number_format($order->total_amount, 2) }}</span>
    </div>

    <div class="mt-4">
      <a href="{{ route('home') }}" class="btn btn-dark pill">
        <i class="bi bi-cart me-1"></i> Continue Shopping
      </a>
    </div>
  </div>
@endsection