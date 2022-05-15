@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <h4 class="mb-4">Kategori Makanan & Minuman</h4>
    <a href="/dashboard/categories/create">
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
                    <th class="border-0">Kategori</th>
                    <th class="border-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $category->category }}
                    </td>
                    <td>
                        <a href="/dashboard/categories/{{ $category->id }}/edit">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <div class="d-inline-block">
                        <form action="/dashboard/categories/{{ $category->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger">Hapus</button>
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
