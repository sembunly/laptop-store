@extends('layouts.app')

@section('title','Checkout')
@section('hero_title','Checkout')
@section('hero_subtitle','Enter address, choose payment, confirm order')
@section('hero_action')
  <a class="btn btn-outline-dark pill px-4" href="{{ route('cart.index') }}">
    <i class="bi bi-arrow-left me-1"></i> Back to Cart
  </a>
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-decoration-none">Cart</a></li>
      <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
  </nav>
@endsection

@section('content')

@php
  $cartItems = $cart ?? [];
  $subtotal = 0;
  foreach ($cartItems as $it) {
    $subtotal += ((float)$it['price']) * ((int)$it['qty']);
  }
@endphp

@if(count($cartItems) === 0)
  <div class="alert alert-light border rounded-4 p-4">
    <div class="fw-bold">Cart is empty.</div>
    <div class="text-muted">Please add products before checkout.</div>
    <a href="{{ route('home') }}" class="btn btn-dark pill mt-3">Go Home</a>
  </div>
@else

<form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data">
  @csrf

  <div class="row g-3 g-lg-4">
    {{-- Left: Address + Payment --}}
    <div class="col-lg-7">
      <div class="card soft-card p-3 p-md-4 mb-3">
        <h5 class="fw-bold mb-3">Delivery Address</h5>

        <div class="row g-2">
          <div class="col-md-6">
            <label class="form-label small text-muted mb-1">Full Name</label>
            <input name="customer_name" value="{{ old('customer_name') }}" class="form-control pill" required>
            @error('customer_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label class="form-label small text-muted mb-1">Phone</label>
            <input name="customer_phone" value="{{ old('customer_phone') }}" class="form-control pill" required>
            @error('customer_phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>

          <div class="col-12">
            <label class="form-label small text-muted mb-1">Address Line</label>
            <input name="address_line" value="{{ old('address_line') }}" class="form-control pill" placeholder="House No, Street, Commune..." required>
            @error('address_line')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label class="form-label small text-muted mb-1">City (Optional)</label>
            <input name="city" value="{{ old('city') }}" class="form-control pill" placeholder="Phnom Penh...">
            @error('city')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label class="form-label small text-muted mb-1">Note (Optional)</label>
            <input name="note" value="{{ old('note') }}" class="form-control pill" placeholder="Leave at door...">
            @error('note')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>

      <div class="card soft-card p-3 p-md-4">
        <h5 class="fw-bold mb-3">Payment</h5>

        <div class="d-flex gap-2 flex-wrap">
          <label class="btn btn-outline-dark pill">
            <input type="radio" class="form-check-input me-2" name="payment_method" value="cod"
                   @checked(old('payment_method','cod')=='cod')>
            Cash on Delivery (COD)
          </label>

          <label class="btn btn-outline-dark pill">
            <input type="radio" class="form-check-input me-2" name="payment_method" value="qr"
                   @checked(old('payment_method')=='qr')>
            Pay by QR
          </label>
        </div>
        @error('payment_method')<div class="text-danger small mt-2">{{ $message }}</div>@enderror

        {{-- QR extra fields --}}
        <div id="qrBox" class="mt-3" style="display:none;">
          <div class="alert alert-light border rounded-4">
            <div class="fw-bold mb-2">QR Payment</div>
            <div class="text-muted small">Upload receipt image or enter payment reference (optional).</div>
          </div>

          <div class="row g-2">
            <div class="col-md-6">
              <label class="form-label small text-muted mb-1">Payment Ref (Optional)</label>
              <input name="payment_ref" value="{{ old('payment_ref') }}" class="form-control pill" placeholder="Transaction ID">
              @error('payment_ref')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label small text-muted mb-1">Upload Receipt (Optional)</label>
              <input type="file" name="receipt_image" class="form-control pill" accept="image/*" id="receiptInput">
              @error('receipt_image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="col-12" id="receiptPreview" style="display:none;">
              <div class="rounded-4 overflow-hidden" style="box-shadow: var(--soft-shadow);">
                <img id="receiptImg" src="" style="width:100%;max-height:280px;object-fit:cover;" alt="receipt">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- Right: Order summary --}}
    <div class="col-lg-5">
      <div class="card soft-card p-3 p-md-4">
        <h5 class="fw-bold mb-3">Confirm Order</h5>

        <div class="small text-muted mb-2">Items</div>

        <div class="d-grid gap-2">
          @foreach($cartItems as $pid => $it)
            <div class="d-flex justify-content-between">
              <div class="me-2">
                <div class="fw-semibold">{{ $it['name'] }}</div>
                <div class="text-muted small">${{ number_format($it['price'],2) }} × {{ (int)$it['qty'] }}</div>
              </div>
              <div class="fw-bold">
                ${{ number_format(((float)$it['price'])*((int)$it['qty']),2) }}
              </div>
            </div>
          @endforeach
        </div>

        <hr>

        @php $shipping = 0; $total = $subtotal + $shipping; @endphp

        <div class="d-flex justify-content-between text-muted">
          <span>Subtotal</span>
          <span>${{ number_format($subtotal,2) }}</span>
        </div>
        <div class="d-flex justify-content-between text-muted mt-2">
          <span>Shipping</span>
          <span>${{ number_format($shipping,2) }}</span>
        </div>

        <hr>

        <div class="d-flex justify-content-between">
          <span class="fw-bold">Total</span>
          <span class="fw-bold fs-5">${{ number_format($total,2) }}</span>
        </div>

        <button class="btn btn-dark pill w-100 mt-3 py-2">
          <i class="bi bi-check2-circle me-1"></i> Place Order
        </button>

        <div class="text-muted small mt-3">
          <i class="bi bi-shield-check me-1"></i> Your info is protected.
        </div>
      </div>
    </div>
  </div>
</form>

@endif
@endsection

@push('scripts')
<script>
  function toggleQR() {
    const method = document.querySelector('input[name="payment_method"]:checked')?.value;
    const box = document.getElementById('qrBox');
    box.style.display = (method === 'qr') ? 'block' : 'none';
  }
  document.querySelectorAll('input[name="payment_method"]').forEach(r => r.addEventListener('change', toggleQR));
  toggleQR();

  // Preview receipt image
  const receiptInput = document.getElementById('receiptInput');
  if(receiptInput){
    receiptInput.addEventListener('change', (e)=>{
      const file = e.target.files?.[0];
      if(!file) return;

      const url = URL.createObjectURL(file);
      document.getElementById('receiptImg').src = url;
      document.getElementById('receiptPreview').style.display = 'block';
    });
  }
</script>
@endpush