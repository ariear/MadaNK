<div>
<h4 class="mb-5">Penjualan</h4>
<div class="row mb-4">
    <div class="col-4 bg-white py-4 ms-2 rounded-2">
        <div class="input-group">
            <input type="search" wire:model="search" class="form-control" placeholder="Search" >
            <span class="input-group-text" id="basic-addon2">
                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </span>
        </div>
    </div>
    <div class="col-7 ms-3 bg-white rounded-3">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Menu</th>
                        <th class="border-0">Gambar</th>
                        <th class="border-0">Kategori</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0">Stok</th>
                        <th class="border-0 rounded-end">Chart</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($foodsmenu as $food)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $food->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $food->img) }}" width="70" alt="">
                        </td>
                        <td>{{ $food->category->category }}</td>
                        <td>{{ $food->price }}</td>
                        <td>{{ $food->stock }}</td>
                        <td><button class="btn btn-warning" wire:click="addToChart({{ $food->id }})">Add</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Menu Belum Tersedia</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {!!  $foodsmenu->links()  !!}
        </div>
    </div>
</div>
<div class="row ms-1">
    <div class="col-11 bg-white rounded-3">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Menu</th>
                        <th class="border-0">Qty</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0">Total</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjangs as $keranjang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $keranjang->foodmenu->name }}</td>
                            <td>{{ $keranjang->qty }}</td>
                            <td>{{ $keranjang->foodmenu->price }}</td>
                            <td>{{ $keranjang->total }}</td>
                            <td><button wire:click="deleteToChart({{ $keranjang }})" class="btn btn-danger">Hapus</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
