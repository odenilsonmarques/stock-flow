<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //list all products
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products',));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(StoreUpdateProduct $request)
    {
        $data = $request->validated();
        $data['admin_id'] = Auth::id(); // pega o id do usuário administrador logado
        $data['uuid'] = (string) Str::uuid();
        Product::create($data);
        // dd($data);
        return redirect()->route('products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }
}
