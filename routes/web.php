<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\ProductOutPut\ProductOutPutController;



Route::get('/',[SiteController::class, 'index'])->name('site.index');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');


Route::get('products',[ProductController::class, 'index'])->name('products.index');
Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');

Route::get('product-outputs',[ProductOutPutController::class, 'index'])->name('productOutPuts.index');
Route::get('product-outputs/create',[ProductOutPutController::class, 'create'])->name('productOutputs.create');
Route::post('product-outputs', [ProductOutPutController::class, 'store'])->name('productOutputs.store');

// rotas padroes do Laravel para autenticação e dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
