<?php

namespace App\Http\Controllers\ProductOutPut;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOutPut;
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
        $data['admin_id'] = auth()->id(); // garante que o ID do admin logado seja usado

        ProductOutPut::create($data);

        // dd($data); // para depuração, remova em produção

        return redirect()
            ->route('productOutPuts.index')
            ->with('success', 'Saída de produto registrada com sucesso!');
    }
}
