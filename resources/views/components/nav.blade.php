<nav class="py-5 fixed w-screen bg-white">
    <div class="container px-5 mx-auto flex items-center justify-between">
    <p class="text-3xl font-quicksans font-bold">Mada<span class="text-[#F46A06]">NX</span></p>
    <div class="font-roboto font-medium text-[#F46A06] flex items-center">
        <a href="/"><p class="mr-5">Home</p></a>
        <a href="/foodsmenu"><p class="mr-5">Menu Makanan</p></a>
        <p class="mr-5">Lokasi</p>
        <p class="mr-10">Tentang Kami</p>
        @can('owner')
        <a href="/dashboard">
        <div class="bg-[#df6b18d2] p-2">
            <img src="/asset/icon/icon-dashboard.png" width="30" alt="">
        </div>
        </a>
        @endcan

        <button class="flex items-center text-white bg-[#F46A06] py-3 px-5 mx-4"><img src="/asset/icon/wa.png" class="w-[24px] mr-2" alt="">Whatsapp</button>
        @auth
        <div>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="flex items-center text-white bg-red-500 py-3 px-9">Keluar</button>
            </form>
        </div>
        @else
        <button class="flex items-center text-white bg-[#F46A06] py-3 px-9"><a href="/login">Masuk</a></button>
        @endauth
    </div>
    </div>
</nav>
