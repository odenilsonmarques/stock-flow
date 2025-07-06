<?php

namespace App\Http\Controllers\ProductOutPut;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOutPut;
use Illuminate\Http\Request;

class ProductOutPutController extends Controller
{
    public function index()
    {
        $productOutPuts = ProductOutPut::all();
        return view('productOutPut.index', compact('productOutPuts'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('productOutPut.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Lógica para armazenar a saída de produtos
        // Validar e processar os dados do formulário

        return redirect()->route('productOutPuts.index')->with('success', 'Saída de produto registrada com sucesso!');
    }
}
