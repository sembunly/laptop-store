@extends('layouts.app')

@section('title','Order Success')
@section('hero_title','Order Placed ✅')
@section('hero_subtitle','Thank you! Your order has been created.')
@section('hero_action')
  <a class="btn btn-dark pill px-4" href="{{ route('home') }}">
    <i class="bi bi-house me-1"></i> Back to Home
  </a>
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Success</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="card soft-card p-3 p-md-4">
    <div class="d-flex justify-content-between align-items-start gap-2">
      <div>
        <h4 class="fw-bold mb-1">Order #{{ $order->id }}</h4>
        <div class="text-muted small">Status: {{ $order->status }} • Payment: {{ $order->payment_method }} ({{ $order->payment_status }})</div>
      </div>
      <span class="badge bg-light text-dark border pill">Success</span>
    </div>

    <hr>

    <div class="row g-3">
      <div class="col-md-6">
        <div class="fw-bold mb-2">Customer</div>
        <div class="text-muted">
          {{ $order->customer_name }}<br>
          {{ $order->customer_phone }}
        </div>
      </div>

      <div class="col-md-6">
        <div class="fw-bold mb-2">Address</div>
        <div class="text-muted">
          {{ $order->address_line }}<br>
          {{ $order->city }}
        </div>
      </div>
    </div>

    <hr>

    <div class="fw-bold mb-2">Items</div>
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="text-muted small">
          <tr>
            <th>Product</th>
            <th class="text-center">Price</th>
            <th class="text-center">Qty</th>
            <th class="text-end">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->items as $it)
            <tr>
              <td class="fw-semibold">{{ $it->product_name }}</td>
              <td class="text-center">${{ number_format($it->price,2) }}</td>
              <td class="text-center">{{ $it->qty }}</td>
              <td class="text-end fw-bold">${{ number_format($it->line_total,2) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <hr>

    <div class="d-flex justify-content-between">
      <span class="text-muted">Subtotal</span>
      <span class="fw-semibold">${{ number_format($order->subtotal,2) }}</span>
    </div>
    <div class="d-flex justify-content-between mt-2">
      <span class="text-muted">Shipping</span>
      <span class="fw-semibold">${{ number_format($order->shipping,2) }}</span>
    </div>
    <div class="d-flex justify-content-between mt-2">
      <span class="fw-bold">Total</span>
      <span class="fw-bold fs-5">${{ number_format($order->total,2) }}</span>
    </div>
  </div>
@endsection