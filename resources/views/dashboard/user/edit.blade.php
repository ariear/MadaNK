@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <form action="/dashboard/users/{{ $user->id }}" method="post">
    @method('put')
    @csrf
    <div class="col-lg-4 col-sm-6">
    <h4 class="mb-5">Edit User {{ $user->name }} </h4>
    <div class="mb-4">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="nama">
    </div>
    <div class="mb-4">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email">
    </div>
    <div class="mb-4">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            @foreach ($roles as $role)
            @if ($user->role === $role)
            <option value="{{ $role }}" selected>{{ $role }}</option>
            @else
            <option value="{{ $role }}">{{ $role }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <button class="btn btn-info" type="submit">Edit User</button>
    </div>
    </div>
</form>
</div>
@endsection
