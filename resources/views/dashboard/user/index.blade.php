@extends('dashboard.app')
@section('content')
<div class="pt-4">
    <h4>Pengaturan User</h4>

    <div class="table-responsive pt-4">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">No</th>
                    <th class="border-0">Nama</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Role</th>
                    <th class="border-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/dashboard/users/{{ $user->id }}/edit"><button class="btn btn-warning">Edit</button></a>
                        <div class="d-inline-block">
                        <form action="/dashboard/users/{{ $user->id }}" method="post">
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
