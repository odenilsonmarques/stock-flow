<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Site\SiteController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[SiteController::class, 'index'])->name('site.index');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');


Route::get('products',[ProductController::class, 'index'])->name('products.index');
Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');