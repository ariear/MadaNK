@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <form action="/dashboard/categories" method="post">
    @csrf
    <div class="col-lg-4 col-sm-6">
    <h4 class="mb-5">Tambah Menu Makanan / Minuman</h4>
    <div class="mb-4">
        <label for="category">Kategori</label>
        <input type="text" class="form-control" name="category" id="nama">
    </div>
    <div class="mb-4">
        <button class="btn btn-info" type="submit">Tambah Kategori</button>
    </div>
    </div>
</form>
</div>
@endsection
