<main class="pb-20 bg-gradient-to-b from-[#FCF5EE] to-[#8FABD4]">
    <section class="relative py-20 md:py-32">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 items-center gap-12">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-bold text-[#0C2B4E] mb-6 text-balance"> Nikmati Makanan Favorit dengan Mudah </h1>
                <p class="text-lg md:text-xl text-gray-700 mb-8 text-balance"> KantinKu menghadirkan pengalaman pemesanan makanan yang cepat, aman, dan menyenangkan. Daftar sekarang untuk akses penuh ke semua fitur! </p>
            </div>
            <div class="flex justify-center md:justify-end">
                <img src="https://via.placeholder.com/400x350.png?text=Gambar+Makanan" alt="Aneka Makanan" class="w-80 md:w-[400px] rounded-2xl shadow-lg">
            </div>
        </div>
    </section>
    <section id="menu" class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Judul -->
            <div class="text-center mb-14">
                <h2 class="text-4xl font-extrabold text-[#0C2B4E] mb-3">🍴 Daftar Menu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto"> Temukan beragam makanan dan minuman favoritmu dari kantin dengan cita rasa terbaik! </p>
                <div class="w-24 h-1 bg-[#FFD700] mx-auto mt-4 rounded-full"></div>
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
                            <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-gray-100 transition font-medium text-gray-700"> Makanan </button>
                            <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-gray-100 transition font-medium text-gray-700"> Minuman </button>
                            <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-gray-100 transition font-medium text-gray-700"> Snack </button>
                        </div>
                    </div>
                </aside>
                <!-- Grid Produk -->
                <div class="flex-1">
                    <div class="mb-6 text-gray-600"> Menampilkan <span id="totalProduk" class="font-bold text-[#0C2B4E]">6</span> produk </div>
                    <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Card Produk -->
                        <div class="product group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-2" data-name="Nasi Goreng Spesial">
                            <div class="relative h-56 overflow-hidden">
                                <img src="https://source.unsplash.com/400x300?fried-rice" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
                                <span class="absolute top-3 left-3 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-xs font-bold rounded-full shadow">Makanan</span>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-lg text-[#0C2B4E] mb-2">Nasi Goreng Spesial</h3>
                                <p class="text-gray-600 text-sm mb-4">Nasi goreng dengan topping lengkap dan rasa autentik khas kantin.</p>
                                <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                    <span class="font-bold text-[#0C2B4E] text-lg">Rp 20.000</span>
                                    <button class="px-4 py-1.5 bg-[#0C2B4E] text-white rounded-lg hover:bg-[#163e6d] transition shadow"> Pesan </button>
                                </div>
                            </div>
                        </div>
                        <div class="product group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-2" data-name="Es Teh Manis">
                            <div class="relative h-56 overflow-hidden">
                                <img src="https://source.unsplash.com/400x300?iced-tea" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
                                <span class="absolute top-3 left-3 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-xs font-bold rounded-full shadow">Minuman</span>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-lg text-[#0C2B4E] mb-2">Es Teh Manis</h3>
                                <p class="text-gray-600 text-sm mb-4">Minuman segar pelepas dahaga dengan rasa manis pas.</p>
                                <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                    <span class="font-bold text-[#0C2B4E] text-lg">Rp 5.000</span>
                                    <button class="px-4 py-1.5 bg-[#0C2B4E] text-white rounded-lg hover:bg-[#163e6d] transition shadow"> Pesan </button>
                                </div>
                            </div>
                        </div>
                        <div class="product group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-2" data-name="Roti Bakar Coklat">
                            <div class="relative h-56 overflow-hidden">
                                <img src="https://source.unsplash.com/400x300?toast-chocolate" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
                                <span class="absolute top-3 left-3 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-xs font-bold rounded-full shadow">Snack</span>
                            </div>
                            <div class="p-5">
                                <h3 class="font-bold text-lg text-[#0C2B4E] mb-2">Roti Bakar Coklat</h3>
                                <p class="text-gray-600 text-sm mb-4">Roti bakar dengan olesan coklat lumer dan tekstur renyah.</p>
                                <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                    <span class="font-bold text-[#0C2B4E] text-lg">Rp 10.000</span>
                                    <button class="px-4 py-1.5 bg-[#0C2B4E] text-white rounded-lg hover:bg-[#163e6d] transition shadow"> Pesan </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>