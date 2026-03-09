@extends('layouts.admin')

@section('title','Edit Product')

@section('content')

<div class="card">
<div class="card-body">

<h3 class="mb-4">Edit Product</h3>

<form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" value="{{ $product->name }}" class="form-control">
</div>

<div class="mb-3">
<label>Brand</label>
<input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
</div>

<div class="mb-3">
<label>Model</label>
<input type="text" name="model" value="{{ $product->model }}" class="form-control">
</div>

<div class="mb-3">
<label>Price</label>
<input type="number" name="price" value="{{ $product->price }}" class="form-control">
</div>

<div class="mb-3">
<label>Stock</label>
<input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
</div>

<div class="mb-3">
<label>Image</label><br>

@if($product->image)
<img src="{{ asset('images/'.$product->image) }}" width="120">
@endif

<input type="file" name="image" class="form-control mt-2">
</div>

<button class="btn btn-primary">Update Product</button>

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
Cancel
</a>

</form>

</div>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
</div>

@endsection