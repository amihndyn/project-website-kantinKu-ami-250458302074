<section class="relative py-10 md:py-22" id="home">
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
                <a href="/products" wire:navigate class="px-8 py-3 bg-[#0C2B4E] text-white font-bold rounded-lg hover:bg-[#163e6d] transition-colors">
                    Lihat Menu
                </a>
                <a href="/signUp" wire:navigate class="px-8 py-3 bg-gray-200 text-gray-800 font-bold rounded-lg hover:bg-gray-300 transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>
        <div class="flex justify-center md:justify-end">
            <img 
            class="w-100 md:w-[1000px]"
            src="{{ asset('images/food.png') }}"
            style="
                animation: float3d 5s ease-in-out infinite;
                transition: transform 0.7s ease;"
            onmouseover="this.style.transform='perspective(900px) rotateX(12deg) rotateY(-12deg) scale(1.07)';"
            onmouseout="this.style.transform='';"/>
        </div>
    </div>
</section>