<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\ProductOutPut\ProductOutPutController;
use App\Http\Controllers\ProductInput\ProductInputController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Report\ReportController;

Route::get('/',[SiteController::class, 'index'])->name('site.index');

// Rotas para fornecedores
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index')->middleware('auth', 'admin');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create')->middleware('auth', 'admin');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store')->middleware('auth', 'admin');


// Rotas para produtos
Route::get('products',[ProductController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('products/create',[ProductController::class, 'create'])->name('products.create')->middleware('auth', 'admin');
Route::post('products', [ProductController::class, 'store'])->name('products.store')->middleware('auth', 'admin');


Route::get('products-input',[ProductInputController::class, 'index'])->name('productsInput.index')->middleware('auth', 'admin');
Route::get('products-input/create',[ProductInputController::class, 'create'])->name('productsInput.create')->middleware('auth', 'admin');
Route::post('products-input', [ProductInputController::class, 'store'])->name('productsInput.store')->middleware('auth', 'admin');



Route::get('product-outputs',[ProductOutPutController::class, 'index'])->name('productOutPuts.index')->middleware('auth', 'admin');
Route::get('product-outputs/create',[ProductOutPutController::class, 'create'])->name('productOutputs.create')->middleware('auth', 'admin');
Route::post('product-outputs', [ProductOutPutController::class, 'store'])->name('productOutputs.store')->middleware('auth', 'admin');

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



// Essa rota foi criada para configurar o primeiro usuário administrador do sistema.
// Ela so deve ser acessada se não houver nenhum usuário cadastrado, ou seja, é uma configuração inicial do sistema.
// Lembrar de passar no fomulário essa rota(setup-admin.store) de redirecionamento para cadastro do primeiro usuário administrador. Depois alterar para a rota admin.users.store
if (\App\Models\User::count() === 0) {
    Route::get('/setup-admin', [UserController::class, 'create'])->name('setup-admin.create');
    Route::post('/setup-admin', [UserController::class, 'store'])->name('setup-admin.store');
}

// restante protegido por autenticação + admin
// Essa rota é protegida por autenticação e só pode ser acessada por usuários com a role de admin.
// Ela contem as rotas de CRUD para usuários do sistema, exceto a rota de exibição de usuário individual.
// Nesse caso optei por usar o padrao das rotas de resource do Laravel, que já implementa as rotas de CRUD para o controlador de usuários.
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});


// Rota para o dashboard do usuário que nao seja admin
Route::get('/users/dashboard', [UserDashboardController::class, 'index'])->name('users.dashboard')->middleware('auth');

// Rota para o dashboard do admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');

// Rotas para view de relatórios basico
Route::get('/report/basic/products', [ReportController::class, 'reportBasicProduct'])->name('report.basic.products')->middleware('auth', 'admin');

// Rota para gerar o PDF do relatório básico
Route::get('/report/basic/pdf', [ReportController::class, 'reportBasicPdf'])->name('report.basic.pdf')->middleware('auth', 'admin');

// Rota para o relatório detalhado de produtos
Route::get('/report/details/products', [ReportController::class, 'reportDetailedProducts'])->name('report.details.products')->middleware('auth', 'admin');

//Rota para gerar o PDF do relatório detalhado de produtos
Route::get('/report/details/pdf', [ReportController::class, 'reportDetailedPdf'])->name('report.details.pdf')->middleware('auth', 'admin');




