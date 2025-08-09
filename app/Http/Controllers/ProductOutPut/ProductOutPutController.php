<?php

namespace App\Http\Controllers\ProductOutPut;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOutPut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductOutPut;

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

    public function store(StoreUpdateProductOutPut $request)
    {
        $data = $request->validated(); // já validado e seguro

        // Pega o produto do banco
        $product = Product::findOrFail($data['product_id']);

        // Atualiza o estoque
        $product->quantity -= $data['quantity_output'];
        $product->save();

        // Registra a saída
        ProductOutPut::create([
            'product_id' => $product->id,
            'admin_id' => Auth::id(), // pega o usuário logado
            'quantity_output' => $data['quantity_output'],
            'destiny' => $data['destiny'],
            'responsible_for_receiving' => $data['responsible_for_receiving'],
        ]);

        return redirect()
            ->route('productOutPuts.index')
            ->with('success', 'Saída de produto registrada com sucesso!');
    }
}
