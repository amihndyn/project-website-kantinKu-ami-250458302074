<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Menu Popular</h1>

        <div class="flex gap-8">
            <!-- Sidebar Filter -->
            <div class="w-1/4">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="font-semibold text-lg mb-4">Kategori</h3>
                    
                    <div class="space-y-2">
                        <!-- Button Semua -->
                        <button 
                            wire:click="$set('category_id', '')"
                            class="w-full text-left px-3 py-2 rounded-lg transition {{ !$category_id ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}"
                        >
                            Semua
                        </button>
                        
                        <!-- List Kategori -->
                        @foreach($categories as $category)
                        <button 
                            wire:click="$set('category_id', {{ $category->id }})"
                            class="w-full text-left px-3 py-2 rounded-lg transition {{ $category_id == $category->id ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}"
                        >
                            {{ $category->name }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Produk -->
            <div class="w-3/4">
                <div class="grid grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                        <!-- Gambar -->
                        <div class="h-40 bg-gray-200 rounded-lg mb-3 flex items-center justify-center">
                            @if($product->image_path)
                                <img src="{{ asset('storage/'.$product->image_path) }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-full w-full object-cover rounded-lg">
                            @else
                                <span class="text-gray-500">No Image</span>
                            @endif
                        </div>
                        
                        <!-- Info -->
                        <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $product->description }}</p>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-green-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Jika tidak ada produk -->
                @if($products->count() == 0)
                <div class="text-center py-12">
                    <p class="text-gray-500">Tidak ada produk dalam kategori ini</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>