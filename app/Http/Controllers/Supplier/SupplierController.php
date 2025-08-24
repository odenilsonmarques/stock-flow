<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateSupplier;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pega o valor digitado no campo de busca (se houver)
        $search = $request->input('search');

        // Monta a query base para buscar os fornecedores, como foi definido no modelo
        $suppliers = Supplier::query()
            // Se $search não for vazio, aplica o filtro:
            // busca pelo nome OU pelo número do documento
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('cpf_cnpj', 'like', "%{$search}%");
            })
            // Ordena os resultados pelo ID (do mais novo para o mais antigo)
            ->orderBy('id', 'desc')
            // Paginação: exibe 4 registros por página
            ->paginate(5);

        // Mantém os filtros na paginação (para não perder o termo de busca ao navegar entre páginas)
        $suppliers->appends(request()->all());

        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSupplier $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $data['admin_id'] = Auth::id(); // pega o id do usuário administrador logado
        Supplier::create($data);
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
