<div>
    <main class="pb-20" style="background-image: url('/images/bg.png'); background-size: cover; background-position: center;">
        <section class="relative py-20 md:py-32" id="home">
            <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold text-[#0C2B4E] mb-6 text-balance">
                        Nikmati Makanan Favorit dengan Mudah
                    </h1>
                    <p class="text-lg md:text-xl text-gray-700 mb-8 text-balance">
                        KantinKu menghadirkan pengalaman pemesanan makanan yang cepat, aman, dan menyenangkan.
                        Daftar sekarang untuk akses penuh ke semua fitur!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="/signUp" wire:navigate class="px-8 py-3 bg-gray-200 text-gray-800 font-bold rounded-lg hover:bg-gray-300 transition-colors">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
                <div class="flex justify-center md:justify-end">
                    <img 
                    class="w-100 md:w-[1000px]"
                    src="/images/food.png"
                    style="
                        animation: float3d 5s ease-in-out infinite;
                        transition: transform 0.7s ease;"
                    onmouseover="this.style.transform='perspective(900px) rotateX(12deg) rotateY(-12deg) scale(1.07)';"
                    onmouseout="this.style.transform='';"/>
                </div>
            </div>
        </section>

        <section id="menu" class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Judul -->
                <div class="text-center mb-14 bg-[#0C2B4E] rounded-2xl p-8 hover:shadow-2xl">
                    <h2 class="text-4xl font-extrabold text-white mb-3">🍴 Daftar Menu</h2>
                    <p class="text-white max-w-2xl mx-auto">
                        Temukan beragam makanan dan minuman favoritmu dari kantin dengan cita rasa terbaik!
                    </p>
                    <div class="w-24 h-1 bg-white mx-auto mt-4 rounded-full"></div>
                </div>



                <div class="flex flex-col lg:flex-row gap-10">
                    <!-- Sidebar -->
                    <aside class="w-full lg:w-72">
                        <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-200 sticky top-24">
                            <!-- Search -->
                            <label class="block text-sm font-semibold mb-2 text-gray-800">Cari Menu</label>
                            <div class="relative mb-6">
                                <input type="text" id="searchInput" placeholder="Cari produk..." class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0C2B4E] focus:outline-none">
                                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
                            </div>
                            <!-- Kategori -->
                            <h3 class="font-bold text-lg mb-3 text-[#0C2B4E]">Kategori</h3>
                            <div class="space-y-2">
                                <button class="w-full text-left px-4 py-2 rounded-lg bg-[#0C2B4E] text-white font-semibold shadow hover:bg-[#163e6d] transition"> Semua </button>
                                @foreach ($categories as $category)
                                    <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-gray-100 transition font-medium text-gray-700"> {{ $category->name }} </button>
                                @endforeach
                            </div>
                        </div>
                    </aside>

                    <!-- Grid Produk -->
                    <div class="flex-1">
                        <div class="mb-6 text-gray-600"> Menampilkan <span id="totalProduk" class="font-bold text-[#0C2B4E]">6</span> produk </div>
                        <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($products as $product)
                                <!-- Card Produk -->
                                <div class="product group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-2" data-name="{{ $product->name }}">
                                    <div class="relative h-56 overflow-hidden">
                                        <img src="https://source.unsplash.com/400x300?{{ Str::slug($product->name) }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
                                        <span class="absolute top-3 left-3 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-xs font-bold rounded-full shadow">{{ $product->category->name }}</span>
                                    </div>
                                    <div class="p-5">
                                        <h3 class="font-bold text-lg text-[#0C2B4E] mb-2">{{ $product->name }}</h3>
                                        <p class="text-gray-600 text-sm mb-4">{{ $product->description }}</p>
                                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                            <span class="font-bold text-[#0C2B4E] text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <button class="px-4 py-1.5 bg-[#0C2B4E] text-white rounded-lg hover:bg-[#163e6d] transition shadow"> Pesan </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
