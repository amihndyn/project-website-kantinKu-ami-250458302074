@if($selectedProduct)
<!-- Background lebih transparan dengan backdrop blur -->
<div class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 z-50 transition-opacity duration-300">
    <!-- Modal container dengan shadow dan border yang lebih halus -->
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-transform duration-300 scale-95 hover:scale-100 shadow-2xl border border-white/20">
        <!-- Header Modal dengan glass effect -->
        <div class="flex justify-between items-center p-6 border-b border-gray-200/50 sticky top-0 bg-white/95 backdrop-blur-sm">
            <h2 class="text-2xl font-bold text-[#0C2B4E]">Detail Produk</h2>
            <button wire:click="closeDetail" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
            <!-- Kolom Kiri: Gambar & Info Dasar -->
            <div class="space-y-6">
                <!-- Gambar dengan shadow -->
                <div class="relative h-80 overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ $selectedProduct->image_path ? asset('storage/' . $selectedProduct->image_path) : 'https://source.unsplash.com/600x600/?food,' . Str::slug($selectedProduct->name) }}" 
                         alt="{{ $selectedProduct->name }}" 
                         class="object-cover w-full h-full transition-transform duration-500 hover:scale-105">
                    <span class="absolute top-4 left-4 bg-[#FFD700] text-[#0C2B4E] px-3 py-1 text-sm font-bold rounded-full shadow-lg">
                        {{ $selectedProduct->category->name }}
                    </span>
                </div>

                <!-- Tombol Bayar di bawah gambar -->
                <div class="text-center">
                    <button wire:click="showPayment" 
                            class="w-full py-4 bg-[#0C2B4E] text-white rounded-xl hover:bg-[#163e6d] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 font-semibold text-lg">
                        💳 Bayar Sekarang
                    </button>
                </div>
            </div>

            <!-- Kolom Kanan: Info Produk & Ikon Interaksi -->
            <div class="space-y-6">
                <!-- Info Dasar Produk -->
                <div class="bg-gray-50/50 rounded-xl p-6 border border-gray-200/50">
                    <h3 class="text-2xl font-bold text-[#0C2B4E] mb-3">{{ $selectedProduct->name }}</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed text-base">{{ $selectedProduct->description }}</p>
                    
                    <!-- Harga -->
                    <div class="text-3xl font-bold text-[#0C2B4E] bg-white/50 rounded-lg p-4 text-center mb-4">
                        Rp {{ number_format($selectedProduct->price, 0, ',', '.') }}
                    </div>

                    <!-- ICON KECIL: Like, Rating, Bookmark, Share -->
                    <div class="flex justify-between items-center">
                        <!-- Like -->
                        <button 
                            wire:click="toggleLike"
                            class="flex items-center space-x-1 text-gray-600 hover:text-red-500 transition duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span class="text-sm">128</span>
                        </button>

                        <!-- Rating -->
                        <div class="flex items-center space-x-1 text-gray-600">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-sm">4.7</span>
                        </div>

                        <!-- Bookmark -->
                        <button 
                            class="flex items-center space-x-1 text-gray-600 hover:text-blue-500 transition duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                            <span class="text-sm">Simpan</span>
                        </button>

                        <!-- Share -->
                        <div class="relative" x-data="{ open: false }">
                            <button 
                                @click="open = !open"
                                class="flex items-center space-x-1 text-gray-600 hover:text-green-500 transition duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span class="text-sm">Bagikan</span>
                            </button>

                            <!-- Share Options Dropdown - DIUBAH KE BAWAH -->
                            <div x-show="open" 
                                 x-cloak
                                 @click.outside="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 p-3 min-w-[200px] z-50">
                                <div class="space-y-2">
                                    <button @click="open = false; shareToWhatsApp('{{ addslashes($selectedProduct->name) }}', '{{ addslashes($selectedProduct->description) }}', {{ $selectedProduct->price }}, '{{ url()->current() }}')" 
                                            class="w-full flex items-center space-x-3 p-2 rounded-lg hover:bg-green-50 transition duration-200 text-left">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">WA</span>
                                        </div>
                                        <span class="text-gray-700 text-sm">WhatsApp</span>
                                    </button>
                                    
                                    <button @click="open = false; shareToFacebook('{{ url()->current() }}')" 
                                            class="w-full flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition duration-200 text-left">
                                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">FB</span>
                                        </div>
                                        <span class="text-gray-700 text-sm">Facebook</span>
                                    </button>
                                    
                                    <button @click="open = false; shareToTwitter('{{ addslashes($selectedProduct->name) }}', {{ $selectedProduct->price }}, '{{ url()->current() }}')" 
                                            class="w-full flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition duration-200 text-left">
                                        <div class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">X</span>
                                        </div>
                                        <span class="text-gray-700 text-sm">Twitter</span>
                                    </button>
                                    
                                    <button @click="open = false; copyShareLink('{{ url()->current() }}')" 
                                            class="w-full flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition duration-200 text-left">
                                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 text-sm">Salin Link</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION KOMENTAR DI BAWAH -->
        <div class="border-t border-gray-200/50 mt-6 pt-6">
            <div class="px-6">
                <h3 class="text-lg font-bold text-[#0C2B4E] mb-4">💬 Komentar Pembeli</h3>
                
                <div class="space-y-4 max-h-60 overflow-y-auto">
                    <!-- Komentar 1 -->
                    <div class="flex space-x-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">A</div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <span class="font-semibold text-gray-800">Andi Pratama</span>
                                <div class="flex items-center text-yellow-400 text-sm">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">Rasanya enak banget! Bumbunya meresap sempurna. Bakal pesen lagi nih.</p>
                            <div class="text-xs text-gray-500 mt-1">
                                <span>2 jam lalu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Komentar 2 -->
                    <div class="flex space-x-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">S</div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <span class="font-semibold text-gray-800">Sari Indah</span>
                                <div class="flex items-center text-yellow-400 text-sm">
                                    ⭐⭐⭐⭐
                                </div>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">Worth it harganya! Porsinya besar dan rasanya authentic banget.</p>
                            <div class="text-xs text-gray-500 mt-1">
                                <span>5 jam lalu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Komentar 3 -->
                    <div class="flex space-x-3">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center text-white font-bold">R</div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <span class="font-semibold text-gray-800">Rina Wijaya</span>
                                <div class="flex items-center text-yellow-400 text-sm">
                                    ⭐⭐⭐⭐⭐
                                </div>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">Pelayanannya cepat, makanan masih hangat pas sampai. Recommended!</p>
                            <div class="text-xs text-gray-500 mt-1">
                                <span>1 hari lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Komentar Baru -->
                @auth
                <div class="mt-6 relative">
                    <textarea 
                        placeholder="Tulis komentarmu..." 
                        class="w-full px-4 py-3 pr-20 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none text-sm"
                        rows="2">
                    </textarea>
                    <div class="absolute bottom-2 right-2 flex items-center space-x-2">
                        <div class="flex space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                            <button class="text-gray-300 hover:text-yellow-400 text-sm transition duration-200">⭐</button>
                            @endfor
                        </div>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 text-sm">
                            Kirim
                        </button>
                    </div>
                </div>
                @else
                <div class="text-center py-3 border border-gray-200 rounded-lg bg-gray-50 mt-4">
                    <p class="text-gray-600 text-sm">Login untuk menambahkan komentar</p>
                    <a href="/login" class="text-blue-500 hover:text-blue-700 font-semibold text-sm">Login Sekarang</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi share ke WhatsApp
function shareToWhatsApp(productName, productDescription, productPrice, productUrl) {
    const formattedPrice = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(productPrice);
    
    const text = `🍽️ *${productName}* 🍽️\n\n${productDescription}\n\n💵 Harga: ${formattedPrice}\n\n🔗 Lihat detail: ${productUrl}`;
    const encodedText = encodeURIComponent(text);
    window.open(`https://wa.me/?text=${encodedText}`, '_blank');
}

// Fungsi share ke Facebook
function shareToFacebook(url) {
    const encodedUrl = encodeURIComponent(url);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`, '_blank', 'width=600,height=400');
}

// Fungsi share ke Twitter
function shareToTwitter(productName, productPrice, url) {
    const formattedPrice = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(productPrice);
    
    const text = encodeURIComponent(`🍽️ ${productName} - ${formattedPrice} 🔗`);
    const encodedUrl = encodeURIComponent(url);
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${encodedUrl}`, '_blank', 'width=600,height=400');
}

// Fungsi copy link ke clipboard
function copyShareLink(url) {
    if (navigator.clipboard && window.isSecureContext) {
        // Menggunakan Clipboard API modern
        navigator.clipboard.writeText(url).then(function() {
            alert('Link berhasil disalin ke clipboard!');
        }).catch(function(err) {
            // Fallback untuk error
            fallbackCopyTextToClipboard(url);
        });
    } else {
        // Fallback untuk browser lama
        fallbackCopyTextToClipboard(url);
    }
}

// Fallback function untuk copy text
function fallbackCopyTextToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    
    // Hindari scroll ke bawah
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";
    
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            alert('Link berhasil disalin ke clipboard!');
        } else {
            alert('Gagal menyalin link. Silakan salin manual: ' + text);
        }
    } catch (err) {
        alert('Gagal menyalin link. Silakan salin manual: ' + text);
    }
    
    document.body.removeChild(textArea);
}
</script>

<style>
[x-cloak] {
    display: none !important;
}
</style>
@endif

<!-- Modal QR Code dengan efek yang sama -->
@if($showPaymentModal)
<div class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 z-60 transition-opacity duration-300">
    <div class="bg-white rounded-2xl p-6 max-w-sm w-full transform transition-transform duration-300 scale-95 hover:scale-100 shadow-2xl border border-white/20">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-[#0C2B4E]">Bayar dengan QRIS</h3>
            <button wire:click="hidePayment" class="text-gray-500 hover:text-gray-700 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="text-center">
            <div class="bg-gray-100/80 rounded-xl p-4 border border-gray-200/50 mb-4">
                <img src="{{ asset('images/qr-dummy.png') }}" alt="QR Code" class="w-64 h-64 mx-auto rounded-lg shadow-inner">
            </div>
            <p class="text-gray-600 mb-4">Scan QR code di atas untuk pembayaran</p>
            <a href="/products" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-300 shadow hover:shadow-lg hover:-translate-y-0.5 font-semibold">
                ✅ Konfirmasi Pembayaran
            </a>
        </div>
    </div>
</div>
@endif