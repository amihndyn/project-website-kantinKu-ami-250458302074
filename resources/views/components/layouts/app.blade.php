<x-layouts.app>
    <div x-data="productApp()">
        <!-- Page Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Products Management</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your store products and inventory</p>
        </div>

        <!-- Cards Metrics -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <!-- Total Products Card -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900">
                    <i class="fas fa-box text-blue-600 dark:text-blue-400 text-lg"></i>
                </div>
                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Total Products</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90" x-text="products.length"></h4>
                    </div>
                    <span class="flex items-center gap-1 rounded-full bg-blue-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-blue-600 dark:bg-blue-500/15 dark:text-blue-500">
                        <i class="fas fa-arrow-up text-xs"></i>
                        12%
                    </span>
                </div>
            </div>

            <!-- In Stock Card -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-900">
                    <i class="fas fa-check-circle text-green-600 dark:text-green-400 text-lg"></i>
                </div>
                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">In Stock</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90" 
                            x-text="products.filter(p => p.stock === 'In Stock').length"></h4>
                    </div>
                </div>
            </div>

            <!-- Low Stock Card -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 dark:bg-yellow-900">
                    <i class="fas fa-exclamation-triangle text-yellow-600 dark:text-yellow-400 text-lg"></i>
                </div>
                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Low Stock</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                            x-text="products.filter(p => p.stock === 'Low Stock').length"></h4>
                    </div>
                </div>
            </div>

            <!-- Out of Stock Card -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100 dark:bg-red-900">
                    <i class="fas fa-times-circle text-red-600 dark:text-red-400 text-lg"></i>
                </div>
                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Out of Stock</span>
                        <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90"
                            x-text="products.filter(p => p.stock === 'Out of Stock').length"></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
            <!-- Card Header -->
            <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
                <div class="w-full">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        Products List
                    </h3>
                    <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
                        Manage and track your product inventory
                    </p>
                </div>

                <div class="flex items-start w-full gap-3 sm:justify-end">
                    <!-- Search Box -->
                    <div class="relative w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-sm"></i>
                        </div>
                        <input 
                            type="text" 
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" 
                            placeholder="Search products..."
                            x-model="searchQuery"
                            @input="filterProducts()"
                        >
                    </div>

                    <!-- Add Product Button -->
                    <button 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors text-sm font-medium"
                        @click="openAddModal()"
                    >
                        <i class="fas fa-plus"></i>
                        Add Product
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap gap-4 mb-6">
                <select 
                    class="border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    x-model="categoryFilter"
                    @change="filterProducts()"
                >
                    <option value="">All Categories</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Watch">Watch</option>
                    <option value="Smartphone">Smartphone</option>
                </select>

                <select 
                    class="border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    x-model="stockFilter"
                    @change="filterProducts()"
                >
                    <option value="">All Stock Status</option>
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>

                <select 
                    class="border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    x-model="brandFilter"
                    @change="filterProducts()"
                >
                    <option value="">All Brands</option>
                    <option value="Apple">Apple</option>
                    <option value="ASUS">ASUS</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Bose">Bose</option>
                </select>
            </div>

            <!-- Products Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 dark:bg-gray-800/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Product</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Brand</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Stock</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-lg flex items-center justify-center"
                                             :class="{
                                                 'bg-blue-100 dark:bg-blue-900': product.category === 'Laptop',
                                                 'bg-green-100 dark:bg-green-900': product.category === 'Accessories',
                                                 'bg-purple-100 dark:bg-purple-900': product.category === 'Watch',
                                                 'bg-orange-100 dark:bg-orange-900': product.category === 'Smartphone'
                                             }">
                                            <i class="fas text-sm"
                                               :class="{
                                                   'fa-laptop text-blue-600 dark:text-blue-400': product.category === 'Laptop',
                                                   'fa-headphones text-green-600 dark:text-green-400': product.category === 'Accessories',
                                                   'fa-clock text-purple-600 dark:text-purple-400': product.category === 'Watch',
                                                   'fa-mobile-alt text-orange-600 dark:text-orange-400': product.category === 'Smartphone',
                                                   'fa-box text-gray-600 dark:text-gray-400': !['Laptop','Accessories','Watch','Smartphone'].includes(product.category)
                                               }"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="product.name"></div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400" x-text="product.description"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900 dark:text-white" x-text="product.category"></span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900 dark:text-white" x-text="product.brand"></span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white" x-text="`$${product.price}`"></span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2.5 py-0.5 text-xs font-semibold rounded-full"
                                          :class="{
                                              'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': product.stock === 'In Stock',
                                              'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': product.stock === 'Low Stock',
                                              'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': product.stock === 'Out of Stock'
                                          }"
                                          x-text="product.stock">
                                    </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" x-text="product.createdAt"></td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button 
                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                                            @click="openEditModal(product)"
                                            title="Edit"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button 
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            @click="deleteProduct(product.id)"
                                            title="Delete"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button 
                                            class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition-colors"
                                            @click="viewProduct(product)"
                                            title="View Details"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="filteredProducts.length === 0">
                            <td colspan="7" class="px-4 py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-inbox text-3xl mb-2 text-gray-300 dark:text-gray-600"></i>
                                <div>No products found</div>
                                <button 
                                    class="mt-2 text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 text-sm font-medium"
                                    @click="openAddModal()"
                                >
                                    Add your first product
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6 mt-6">
                <div class="flex justify-between flex-1 sm:hidden">
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                        Previous
                    </button>
                    <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                        Next
                    </button>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            Showing
                            <span class="font-medium" x-text="filteredProducts.length"></span>
                            of
                            <span class="font-medium" x-text="products.length"></span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                                1
                            </button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                                2
                            </button>
                            <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Product Modal -->
        <div 
            class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50"
            x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white" x-text="editingProduct ? 'Edit Product' : 'Add New Product'"></h3>
                        <button @click="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form @submit.prevent="saveProduct()" class="mt-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Name</label>
                            <input 
                                type="text" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                x-model="currentProduct.name"
                                required
                            >
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                                <select 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    x-model="currentProduct.category"
                                    required
                                >
                                    <option value="">Select Category</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Watch">Watch</option>
                                    <option value="Smartphone">Smartphone</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Brand</label>
                                <input 
                                    type="text" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    x-model="currentProduct.brand"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                                <input 
                                    type="number" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    x-model="currentProduct.price"
                                    min="0"
                                    step="0.01"
                                    required
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock Status</label>
                                <select 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    x-model="currentProduct.stock"
                                    required
                                >
                                    <option value="In Stock">In Stock</option>
                                    <option value="Low Stock">Low Stock</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                rows="3"
                                x-model="currentProduct.description"
                            ></textarea>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <button 
                                type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600"
                                @click="closeModal()"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700"
                                x-text="editingProduct ? 'Update Product' : 'Add Product'"
                            ></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function productApp() {
            return {
                searchQuery: '',
                categoryFilter: '',
                stockFilter: '',
                brandFilter: '',
                showModal: false,
                editingProduct: false,
                currentProduct: {
                    id: null,
                    name: '',
                    category: '',
                    brand: '',
                    price: '',
                    stock: 'In Stock',
                    description: '',
                    createdAt: ''
                },
                products: [
                    {
                        id: 1,
                        name: 'ASUS ROG Gaming Laptop',
                        category: 'Laptop',
                        brand: 'ASUS',
                        price: '2199',
                        stock: 'Low Stock',
                        description: 'High-performance gaming laptop with RTX 4080',
                        createdAt: '01 Dec, 2027'
                    },
                    {
                        id: 2,
                        name: 'Airpods Pro 2nd Gen',
                        category: 'Accessories',
                        brand: 'Apple',
                        price: '839',
                        stock: 'In Stock',
                        description: 'Wireless earbuds with active noise cancellation',
                        createdAt: '29 Jun, 2027'
                    },
                    {
                        id: 3,
                        name: 'Apple Watch Ultra',
                        category: 'Watch',
                        brand: 'Apple',
                        price: '1579',
                        stock: 'Low Stock',
                        description: 'Premium smartwatch for outdoor activities',
                        createdAt: '13 Mar, 2027'
                    },
                    {
                        id: 4,
                        name: 'Bose QuietComfort Earbuds',
                        category: 'Accessories',
                        brand: 'Bose',
                        price: '799',
                        stock: 'In Stock',
                        description: 'Noise cancelling wireless earbuds',
                        createdAt: '15 May, 2027'
                    },
                    {
                        id: 5,
                        name: 'Samsung Galaxy S24 Ultra',
                        category: 'Smartphone',
                        brand: 'Samsung',
                        price: '1299',
                        stock: 'In Stock',
                        description: 'Flagship smartphone with S-Pen',
                        createdAt: '20 Jan, 2027'
                    },
                    {
                        id: 6,
                        name: 'MacBook Pro 16"',
                        category: 'Laptop',
                        brand: 'Apple',
                        price: '2499',
                        stock: 'Out of Stock',
                        description: 'Professional laptop with M3 Max chip',
                        createdAt: '10 Feb, 2027'
                    }
                ],
                filteredProducts: [],
                
                init() {
                    this.filteredProducts = [...this.products];
                },
                
                filterProducts() {
                    this.filteredProducts = this.products.filter(product => {
                        const matchesSearch = product.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                            product.brand.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                                            product.description.toLowerCase().includes(this.searchQuery.toLowerCase());
                        const matchesCategory = !this.categoryFilter || product.category === this.categoryFilter;
                        const matchesStock = !this.stockFilter || product.stock === this.stockFilter;
                        const matchesBrand = !this.brandFilter || product.brand === this.brandFilter;
                        
                        return matchesSearch && matchesCategory && matchesStock && matchesBrand;
                    });
                },
                
                openAddModal() {
                    this.editingProduct = false;
                    this.currentProduct = {
                        id: null,
                        name: '',
                        category: '',
                        brand: '',
                        price: '',
                        stock: 'In Stock',
                        description: '',
                        createdAt: new Date().toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })
                    };
                    this.showModal = true;
                },
                
                openEditModal(product) {
                    this.editingProduct = true;
                    this.currentProduct = {...product};
                    this.showModal = true;
                },
                
                closeModal() {
                    this.showModal = false;
                    this.editingProduct = false;
                },
                
                viewProduct(product) {
                    // Show product details
                    Swal.fire({
                        title: product.name,
                        html: `
                            <div class="text-left">
                                <p><strong>Category:</strong> ${product.category}</p>
                                <p><strong>Brand:</strong> ${product.brand}</p>
                                <p><strong>Price:</strong> $${product.price}</p>
                                <p><strong>Stock:</strong> ${product.stock}</p>
                                <p><strong>Description:</strong> ${product.description}</p>
                                <p><strong>Created:</strong> ${product.createdAt}</p>
                            </div>
                        `,
                        icon: 'info',
                        confirmButtonText: 'Close'
                    });
                },
                
                saveProduct() {
                    if (this.editingProduct) {
                        // Update existing product
                        const index = this.products.findIndex(p => p.id === this.currentProduct.id);
                        if (index !== -1) {
                            this.products[index] = {...this.currentProduct};
                        }
                    } else {
                        // Add new product
                        this.currentProduct.id = Date.now();
                        this.products.unshift({...this.currentProduct});
                    }
                    
                    this.filterProducts();
                    this.closeModal();
                    
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: this.editingProduct ? 'Product Updated' : 'Product Added',
                        text: this.editingProduct ? 'Product has been updated successfully' : 'New product has been added successfully',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                
                deleteProduct(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.products = this.products.filter(product => product.id !== id);
                            this.filterProducts();
                            
                            Swal.fire(
                                'Deleted!',
                                'Product has been deleted.',
                                'success'
                            );
                        }
                    });
                }
            }
        }
    </script>
</x-layouts.app>