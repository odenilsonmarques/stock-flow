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
    // Listar todos os produtos
    public function index(Request $request)
    {
        // Pega o valor digitado no campo de busca (se houver)
        $search = $request->input('search');

        // Monta a query base para buscar os produtos, como foi definido no modelo
        $products = Product::query()
            // Se $search não for vazio, aplica o filtro:
            // busca pelo nome OU pelo número do produto
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('product_number', 'like', "%{$search}%");
            })
            // Ordena os resultados pelo ID (do mais novo para o mais antigo)
            ->orderBy('id', 'desc')
            // Paginação: exibe 4 registros por página
            ->paginate(5);

        // Mantém os filtros na paginação (para não perder o termo de busca ao navegar entre páginas)
        $products->appends(request()->all());

        return view('product.index', compact('products'));
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
