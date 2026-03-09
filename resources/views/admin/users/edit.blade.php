@extends('layouts.admin')

@section('title','Edit User')

@section('content')

<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4 class="m-0">Edit User</h4>

<a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark btn-sm">
    Back to List
</a>

</div>

<div class="shadow-sm card">

<div class="bg-white card-header">
<strong>Update User</strong>
<div class="text-muted small">
Edit user information
</div>
</div>

<div class="card-body">

<form action="{{ route('admin.users.update',$user->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Name</label>

<input type="text"
name="name"
value="{{ old('name',$user->name) }}"
class="form-control">

</div>

<div class="mb-3">
<label class="form-label">Email</label>

<input type="email"
name="email"
value="{{ old('email',$user->email) }}"
class="form-control">

</div>

<div class="mb-3">
<label class="form-label">Role</label>

<select name="role" class="form-control">

<option value="user"
{{ $user->role == 'user' ? 'selected' : '' }}>
User
</option>

<option value="admin"
{{ $user->role == 'admin' ? 'selected' : '' }}>
Admin
</option>

</select>

</div>

<button class="btn btn-primary">
Update User
</button>

</form>

</div>

</div>

@endsection
