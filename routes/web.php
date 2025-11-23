<?php
use App\Livewire\Admin\Categories;
use App\Livewire\Admin\Products;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Components\ListProduct;
use App\Livewire\Index;
use App\Livewire\ProductSearch;

// Public routes
Route::get('/', Index::class)->name('home');
Route::get('/menu', ProductSearch::class);
Route::get('/signIn', Login::class)->name('login');
Route::get('/signUp', Register::class)->name('register');

// Protected routes - butuh login
Route::middleware(['auth'])->group(function () {
    // Buyer routes
    Route::get('/products', ListProduct::class)->name('products');
    
    // 🔥 ADMIN ROUTES - STRUCTURE YANG BENAR
    Route::prefix('admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            // Cek role admin
            if (auth()->user()->role !== 'admin') {
                return redirect('/products');
            }
            return view('Admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', Categories::class)->name('admin.categories');
        Route::get('/products', Products::class)->name('admin.products');
    });
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');