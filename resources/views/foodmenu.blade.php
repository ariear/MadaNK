@extends('app')
@section('container')
    <div class="container px-5 mx-auto pt-36 pb-10">
        <div class="mb-10">
            <p class="font-quicksans font-medium text-3xl">Pilih Menu</p>
        </div>

        <div class="grid grid-cols-6">
            @forelse ($foods as $food)
            <div class="w-[200px] shadow border p-3 box-content rounded-xl hover:scale-105 transition-all duration-300">
                <img src="{{ asset('storage/' . $food->img) }}" class="w-[200px] h-[190px] mb-2 rounded-lg object-cover object-center" alt="">
                <p class="font-quicksans font-medium text-lg">{{ $food->name }}</p>
                <div class="mt-3 font-roboto flex items-center justify-between">
                    <p>{{ $food->price }}</p>
                    <img src="/asset/icon/panah-kanan-hitam.png" alt="">
                </div>
            </div>
            @empty
                <p>Menu Belum Tersedia</p>
            @endforelse
        </div>
    </div>
@endsection
