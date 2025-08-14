<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $suppliersQuantity = Supplier::count(); // contando os fornecedores para exibir no card
        $productsQuantity = Product::count(); // contando os produtos para exibir no card
        // $availableProducts = Product::where('status', 'available')->count(); // contando os produtos disponíveis
        // $minimumStockProducts = Product::where('stock', '<=', 'minimum')->count(); // contando os produtos com estoque mínimo
        // $belowMinimumStockProducts = Product::where('stock', '<', 'minimum')->count(); // contando os produtos abaixo do estoque mínimo
        // $zeroStockProducts = Product::where('stock', '=', 0)->count(); // contando os produtos com estoque zerado

        return view('admin.dashboard', compact(
            'suppliersQuantity',
            'productsQuantity',
            // 'availableProducts',
        ));
    }
}
