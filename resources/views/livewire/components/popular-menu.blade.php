<div>
    <section id="menu" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-[#0C2B4E] mb-8">Menu Populer</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($populars as $popular)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-2 flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $popular->image_path ? asset('storage/' . $popular->image_path) : 'https://source.unsplash.com/400x300/?food,' . Str::slug($popular->name) }}" 
                                 alt="{{ $popular->name }}" 
                                 class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
                            <span class="absolute top-3 left-3 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-xs font-bold rounded-full shadow">{{ $popular->category->name }}</span>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="font-bold text-lg text-[#0C2B4E] mb-2">{{ $popular->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">{{ $popular->description }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xl font-bold text-[#0C2B4E]">Rp {{ number_format($popular->price, 0, ',', '.') }}</span>
                                <div class="flex flex-row gap-2 justify-center items-center">
                                    <span class="text-sm text-gray-600 flex items-center gap-1">
                                        <span class="text-red-500">❤️</span> {{ $popular->likes_count ?? 0 }}
                                    </span>
                                    <span class="text-sm text-gray-600 flex items-center gap-1">
                                        <span class="text-yellow-500">⭐</span> 4.7
                                    </span>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <button wire:click="openDetail({{ $popular->id }})" 
                                        class="w-full px-4 py-3 bg-[#0C2B4E] text-white rounded-lg hover:bg-[#163e6d] transition shadow font-semibold text-center">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="col-span-full flex items-center justify-center mt-8">
                    <a href="/products" wire:navigate class="px-6 py-3 bg-[#0C2B4E] text-white font-semibold rounded-lg hover:bg-[#163e6d] transition shadow">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('livewire.components.product-detail')
</div>