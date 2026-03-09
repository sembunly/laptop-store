@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row">
        <!-- Stats Widgets -->
        <div class="col-md-3 grid-margin stretch-card">
            <div class="text-white card bg-primary">
                <div class="card-body">
                    <h4 class="text-white card-title">Total Products</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="mdi mdi-package-variant mdi-36px"></i>
                        <h2 class="mb-0">{{ $totalProducts }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="text-white card bg-success">
                <div class="card-body">
                    <h4 class="text-white card-title">Total Users</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="mdi mdi-account-multiple mdi-36px"></i>
                        <h2 class="mb-0">{{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="text-white card bg-info">
                <div class="card-body">
                    <h4 class="text-white card-title">Total Orders</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="mdi mdi-receipt mdi-36px"></i>
                        <h2 class="mb-0">{{ $totalOrders }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="text-white card bg-warning">
                <div class="card-body">
                    <h4 class="text-white card-title">Total Revenue</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="mdi mdi-cash mdi-36px"></i>
                        <h2 class="mb-0">${{ number_format($totalRevenue, 2) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="text-white card bg-info">
                <div class="card-body">
                    <h4 class="text-white card-title">Total Categories</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="mdi mdi-receipt mdi-36px"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    
@endsection