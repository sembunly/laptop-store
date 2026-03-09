@extends('layouts.admin')

@section('title','Create User')

@section('content')

<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4 class="m-0">Create User</h4>

<a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark btn-sm">
    Back to List
</a>

</div>

<div class="shadow-sm card">

<div class="bg-white card-header">
<strong>User Form</strong>
<div class="text-muted small">
Create a new user account
</div>
</div>

<div class="card-body">

<form action="{{ route('admin.users.store') }}" method="POST">

@csrf

<div class="mb-3">
<label class="form-label">Name</label>

<input type="text"
name="name"
value="{{ old('name') }}"
class="form-control"
placeholder="Enter user name">

</div>

<div class="mb-3">
<label class="form-label">Email</label>

<input type="email"
name="email"
value="{{ old('email') }}"
class="form-control"
placeholder="Enter email address">

</div>

<div class="mb-3">
<label class="form-label">Password</label>

<input type="password"
name="password"
class="form-control"
placeholder="Enter password">

</div>

<div class="mb-3">
<label class="form-label">Role</label>

<select name="role" class="form-control">

<option value="user">User</option>
<option value="admin">Admin</option>

</select>

</div>

<button class="btn btn-primary">
Create User
</button>

</form>

</div>

</div>

@endsection
