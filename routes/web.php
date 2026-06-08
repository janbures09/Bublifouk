<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/nastenka', function () {
        return 'Vítej v admin sekci e-shopu!';
    })->name('admin.dashboard');


    Route::get('/produkty', function () {
        return 'Tady bude tabulka všech bublifuků s možností úprav.';
    })->name('admin.products');

    Route::resource('produkty', AdminProductController::class)->names('admin.products');
    Route::resource('kategorie', AdminCategoryController::class)->names('admin.categories');
});

Route::get('/', [ShopController::class, 'index'])->name('home');

Route::get('/kategorie/{id}', [ShopController::class, 'showCategory'])->name('kategorie.show');

Route::get('/produkt/{id}', [ShopController::class, 'showProduct'])->name('produkt.show');

Route::post('/pridat-do-kosiku', [ShopController::class, 'addToCart'])->name('cart.add');

Route::get('/kosik', [ShopController::class, 'showCart'])->name('cart.show');

Route::delete('/vyprazdnit-kosik', [ShopController::class, 'clearCart'])->name('cart.clear');

Route::delete('/odstranit-z-kosiku/{id}', [ShopController::class, 'removeItem'])->name('cart.remove');

Route::patch('/upravit-kosik/{id}', [ShopController::class, 'updateQuantity'])->name('cart.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
