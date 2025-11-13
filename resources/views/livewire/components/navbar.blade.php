<nav class="sticky top-0 z-bg-gradient-to-b from-[#8FABD4] to-[#FCF5EE] shadow z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="#" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#0C2B4E] flex items-center justify-center">
                    <span class="text-white font-bold text-lg">K</span>
                </div>
                <span class="font-bold text-xl text-[#0C2B4E] hidden sm:inline">KantinKu</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="/#home" class="text-gray-700 hover:text-[#0C2B4E] transition-colors font-medium">Home</a>
                <a href="/#about" class="text-gray-700 hover:text-[#0C2B4E] transition-colors font-medium">About</a>
                <a href="/#menu" class="text-gray-700 hover:text-[#0C2B4E] transition-colors font-medium">Menu</a>
                </div>

            <div class="hidden md:flex items-center gap-4">
                <a href="#" class="px-6 py-2 text-[#0C2B4E] font-semibold hover:text-[#8FABD4] transition-colors">
                    Sign In
                </a>
                <a href="#" class="px-6 py-2 bg-[#0C2B4E] text-white rounded-lg font-semibold hover:bg-[#8FABD4] transition-colors">
                    Sign Up
                </a>
            </div>

            <button id="menu-btn" class="md:hidden" aria-label="Toggle menu">
                <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon-open" class="w-6 h-6 text-[#0C2B4E]" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon-close" class="w-6 h-6 text-[#0C2B4E] hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Home</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">About</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Menu</a>
            <div class="pt-2 border-t border-gray-200 flex gap-2">
                <a href="#" class="flex-1 px-4 py-2 text-center text-[#0C2B4E] font-semibold hover:bg-gray-100 rounded-lg">
                    Sign In
                </a>
                <a href="#" class="flex-1 px-4 py-2 text-center bg-[#0C2B4E] text-white rounded-lg font-semibold hover:bg-[#0C2B4E]">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</nav>