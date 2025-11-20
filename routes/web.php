<?php

use App\Livewire\Index;
use App\Livewire\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [ Index::class, 'render']);
Route::get('/products', [ Product::class, 'render' ]);
Route::get('/dashboard', function (){
    return view('Admin.dashboard');})->name('dashboard');
Route::get('/signIn', function () {
    return view('auth.signIn');
})->name('login');

Route::get('/signUp', function () {
    return view('auth.signUp');
})->name('register');
