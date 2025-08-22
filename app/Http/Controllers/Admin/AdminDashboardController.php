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
        $availableProducts = Product::where('quantity', '>', 0)->count(); // contando os produtos disponíveis
        $minimumStockProducts = Product::whereColumn('quantity', 'minimum_quantity')->count(); // contando os produtos com estoque mínimo
        $belowMinimumStockProducts = Product::whereColumn('quantity', '<', 'minimum_quantity')->count(); // contando os produtos abaixo do estoque mínimo
        $zeroStockProducts = Product::where('quantity', '=', 0)->count(); // contando os produtos com estoque zerado

        return view('admin.dashboard', compact(
            'suppliersQuantity',
            'zeroStockProducts',
            'belowMinimumStockProducts',
            'minimumStockProducts',
            'availableProducts',
        ));
    }
}
