@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <a href="/dashboard/foodmenu/create">
        <button class="btn btn-gray-800">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Menu
        </button>
    </a>

    <div class="table-responsive pt-4">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">No</th>
                    <th class="border-0">Nama</th>
                    <th class="border-0">Gambar</th>
                    <th class="border-0">Kategori</th>
                    <th class="border-0">Deskripsi</th>
                    <th class="border-0">Harga</th>
                    <th class="border-0">Stok</th>
                    <th class="border-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foodmenus as $foodmenu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $foodmenu->name }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $foodmenu->img) }}" width="100" alt="">
                    </td>
                    <td>
                       {{ $foodmenu->category->category }}
                    </td>
                    <td>
                       {{ $foodmenu->desc }}
                    </td>
                    <td>
                        {{ $foodmenu->price }}
                    </td>
                    <td>
                        {{ $foodmenu->stock }}
                    </td>
                    <td>
                        <a href="/dashboard/foodmenu/{{ $foodmenu->id }}/edit">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <div class="d-inline-block">
                        <form action="/dashboard/foodmenu/{{ $foodmenu->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
