@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <form action="/dashboard/foodmenu" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-4 col-sm-6">
    <h4 class="mb-5">Tambah Menu Makanan / Minuman</h4>
    <div class="mb-4">
        <label for="foto" class="form-label">Foto Makanan/Minuman</label>
        <input class="form-control" name="img" type="file" id="foto">
    </div>
    <div class="mb-4">
        <label for="nama">Nama Makanan/Minuman</label>
        <input type="text" class="form-control" name="name" id="nama">
    </div>
    <div class="d-flex mb-1">
    <div class="me-4">
        <input class="form-check-input" type="radio" name="type" id="makanan" value="Makanan">
        <label class="form-check-label" for="makanan">
          Makanan
        </label>
    </div>
    <div>
        <input class="form-check-input" type="radio" name="type" id="minuman" value="Minuman">
        <label class="form-check-label" for="minuman">
          Minuman
        </label>
    </div>
    </div>
    <div class="mb-4">
        <label class="my-1 me-2" for="country">Kategori</label>
        <select name="category_id" class="form-select" id="country" aria-label="Default select example">
            <option selected>Buka untuk melihat menu</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="textarea">Deskripsi</label>
        <textarea class="form-control" name="desc" placeholder="deskripsikan makanan/minuman" id="textarea" rows="4"></textarea>
    </div>
    <div class="mb-4">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" name="price" id="harga">
    </div>
    <div class="mb-4">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock">
    </div>
    <div class="mb-4">
        <button class="btn btn-info" type="submit">Tambah Makanan</button>
    </div>
    </div>
</form>
</div>
@endsection
