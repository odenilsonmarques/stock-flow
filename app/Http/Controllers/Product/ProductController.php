<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateProduct;
use Illuminate\Http\Request;    
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //list all products
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products', )); 
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        return view('product.create', compact('suppliers'));
    }

    public function store(StoreUpdateProduct $request)
    {
        $data = $request->validated();
        $data['uuid'] = (string) Str::uuid();
        Product::create($data);
        // dd($data);
        return redirect()->route('products.index')
        ->with('success', 'Produto cadastrado com sucesso!');

    }

}
