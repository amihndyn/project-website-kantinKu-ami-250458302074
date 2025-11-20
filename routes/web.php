<?php

use App\Http\Livewire\Components\ListProduct;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('/products', ListProduct::class);

Route::get('/dashboard', function (){
    return view('Admin.dashboard');})->name('dashboard');

// Auth
Route::get('/signIn', Login::class)->name('login');
Route::get('/signUp', Register::class)->name('register');
