<section id="menu" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-[#0C2B4E] mb-8">Menu Populer</h2>
        
        <div class="mb-6">
            <input 
                type="text" 
                placeholder="Cari menu makanan..." 
                class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[30C2B4E]"
            >
        </div>

        <div class="flex flex-wrap gap-2 mb-8">
            <a href="#" class="px-4 py-1.5 bg-[#0C2B4E] text-white rounded-full text-sm font-medium">Semua</a>
            @foreach ($categories as $category)
            <a href="/categories/{{ $category->slug }}" class="px-4 py-1.5 bg-white/80 hover:bg-white text-gray-700 rounded-full text-sm font-medium transition-colors">{{ $category->name }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($populars as $popular)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <img src="https://via.placeholder.com/400x300.png?text=Mie+Ayam" alt="{{ $popular->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $popular->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $popular->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-bold text-[30C2B4E]">Rp {{ number_format($popular->price, 0, ',', '.') }}</span>
                            <div class="flex flex-row gap-2 justify-center items-center">
                                <span class="text-sm text-yellow-500">👍 {{ $popular->likes_count }}</span>
                                <span class="text-sm text-yellow-500">⭐ 4.7</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 bg-gray-200 text-gray-900 rounded-lg text-sm cursor-not-allowed opacity-60">
                                Login to Like
                            </button>
                            <button class="px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm">
                                📤 Share
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="flex items-center justify-center">
                <a href="/products" wire:navigate class="px-8 py-3 bg-[#0C2B4E] text-white font-bold rounded-lg hover:bg-[#163e6d] transition-colors">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>