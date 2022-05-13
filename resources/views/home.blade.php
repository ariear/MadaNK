@extends('app')
@section('container')
    <div class="container px-5 mx-auto flex justify-between items-center min-h-screen">
        <div class="w-[550px]">
            <p class="font-quicksans text-5xl font-bold mb-5">Pesan makanan favorit anda!!</p>
            <p class="font-roboto text-[#555555] mb-7">Di restoran kami ini , kami menyediakan berbagai macam makanan dan minuman , dari seafood , junkfood , makanan sehat , dll</p>
            <div class="font-roboto font-bold text-sm flex items-center">
                <button class="bg-[#F46A06] text-white py-3 px-5 mr-4 flex items-center shadow">Pesan Sekarang <img src="/asset/icon/keranjang.png" class="ml-2" alt=""></button>
                <button class="bg-white py-3 px-10 shadow-lg flex items-center border">Pelajari <img src="/asset/icon/panah-kanan-hitam.png" class="ml-3" alt=""></button>
            </div>
        </div>
        <img src="/asset/img/main-ayam-geprek.png" alt="">
    </div>
    <div class="bg-[#F46A06] py-8">
        <div class="container px-5 mx-auto font-quicksans flex items-center justify-evenly">
            <div class="text-center text-white">
                <p class="font-bold text-3xl mb-1">69</p>
                <p class="text-sm font-medium">jenis Makanan</p>
            </div>
            <div class="text-center text-white">
                <p class="font-bold text-3xl mb-1">97</p>
                <p class="text-sm font-medium">jenis Minum</p>
            </div>
            <div class="text-center text-white">
                <p class="font-bold text-3xl mb-1">40</p>
                <p class="text-sm font-medium">Terjual Online</p>
            </div>
            <div class="text-center text-white">
                <p class="font-bold text-3xl mb-1">69</p>
                <p class="text-sm font-medium">User</p>
            </div>
        </div>
    </div>
@endsection
