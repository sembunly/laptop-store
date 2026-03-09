@extends('layouts.frontend')

@section('title','Edit Profile')
@section('hero_title','Edit Profile')
@section('hero_subtitle','Update your account information')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="border-0 shadow card rounded-4">
            <div class="card-body">
                <h4 class="mb-4">Update Profile</h4>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', auth()->user()->name) }}"
                            class="form-control"
                            required
                        >
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="form-control"
                            required
                        >
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="gap-2 mt-4 d-flex">
                        <button type="submit" class="btn btn-dark">Update Profile</button>
                        <a href="{{ route('profile') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection