@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <form action="/dashboard/foodmenu/{{ $foodmenu['id'] }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="col-lg-4 col-sm-6">
    <h4 class="mb-5">Edit Menu {{ $foodmenu['name'] }}</h4>
    <div class="mb-4">
        <label for="foto" class="form-label">Foto Makanan/Minuman</label>
        <input type="hidden" name="oldImg" value="{{ $foodmenu['img'] }}">
        <input class="form-control" name="img" type="file" id="foto">
    </div>
    <div class="mb-4">
        <label for="nama">Nama Makanan/Minuman</label>
        <input type="text" class="form-control" name="name" value="{{ $foodmenu['name'] }}" id="nama">
    </div>
    <div class="d-flex mb-1">
    <div class="me-4">
        <input class="form-check-input" type="radio" name="type" id="makanan" value="Makanan" {{$foodmenu['type'] == 'Makanan'? 'checked' : ''}}>
        <label class="form-check-label" for="makanan">
          Makanan
        </label>
    </div>
    <div>
        <input class="form-check-input" type="radio" name="type" id="minuman" value="Minuman" {{$foodmenu['type'] == 'Minuman'? 'checked' : ''}}>
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
            @if ($foodmenu['category_id'] == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
            @endif
            <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="textarea">Deskripsi</label>
        <textarea class="form-control" name="desc" placeholder="deskripsikan makanan/minuman" id="textarea" rows="4">{{ $foodmenu['desc'] }}</textarea>
    </div>
    <div class="mb-4">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" name="price" value="{{ $foodmenu['price'] }}" id="harga">
    </div>
    <div class="mb-4">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ $foodmenu['stock'] }}" id="stock">
    </div>
    <div class="mb-4">
        <button class="btn btn-info" type="submit">Edit Makanan</button>
    </div>
    </div>
</form>
</div>
@endsection
