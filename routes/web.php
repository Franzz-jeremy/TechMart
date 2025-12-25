<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('menu.index');

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Utama (User)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route untuk USER Biasa
    Route::get('/menu', [ProductController::class, 'userIndex'])->name('user.menu');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    
    // Route Detail Pesanan User (Dibuat unik agar tidak bentrok dengan admin)
    Route::get('/my-orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Route khusus ADMIN
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // Resource ini menghasilkan name: categories.index, products.index, dll. (Sesuai Navigasi kamu)
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        
        // Manajemen Pesanan Admin
        Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update');
        
        // INI PERBAIKANNYA: Route Destroy & Show Admin
        Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
        Route::get('/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
        
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
    });

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';