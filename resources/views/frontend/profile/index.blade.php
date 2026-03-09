@extends('layouts.frontend')

@section('title','My Profile')
@section('hero_title','My Profile')
@section('hero_subtitle','Manage your account information')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="border-0 shadow-sm card rounded-4">
            <div class="card-body">

                <h4 class="mb-4">Account Information</h4>

                <div class="mb-3 row">
                    <div class="col-md-4 fw-bold">Name</div>
                    <div class="col-md-8">{{ auth()->user()->name }}</div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-4 fw-bold">Email</div>
                    <div class="col-md-8">{{ auth()->user()->email }}</div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-4 fw-bold">Account Created</div>
                    <div class="col-md-8">
                        {{ auth()->user()->created_at->format('d M Y') }}
                    </div>
                </div>

                <hr>

                <div class="mt-3">
                    <a href="{{ route('profile.edit') }}" class="btn btn-dark">
                        Edit Profile
                    </a>

                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        Back to Home
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection