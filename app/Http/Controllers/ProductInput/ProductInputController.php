<?php

namespace App\Http\Controllers\ProductInput;

use App\Http\Controllers\Controller;
use App\Models\ProductInput; // Assuming you have a ProductInput model
use App\Models\Product; // Assuming you have a Products model
use App\Models\Supplier; // Assuming you have a Supplier model
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProductInput; // Importing the request class for validation

class ProductInputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recupera o termo digitado no campo de busca (se houver)
        $search = $request->input('search');
        // Monta a query base para buscar as entradas de produtos
        $productInputs = ProductInput::query()
            ->filterBySearch($search) // aplica o filtro centralizado no Model
            ->orderBy('id', 'desc')   // ordena do mais recente para o mais antigo
            ->paginate(5);            // paginação de 5 registros por página

        // Mantém o termo de busca na paginação
        $productInputs->appends(request()->all());

        // Retorna a view com os dados
        return view('productInput.index', compact('productInputs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all(); // Assuming you have a ProductInput model
        $suppliers = Supplier::all(); // Assuming you have a Supplier model
        // dd($products); // Debugging line to check the data
        return view('productInput.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProductInput $request)
    {
        $validated = $request->validated();
        ProductInput::create([
            'product_id'     => $validated['product_id'],
            'supplier_id'    => $validated['supplier_id'],
            'admin_id'       => Auth::id(), // quem registrou a entrada
            'quantity_input' => $validated['quantity_input'],
            'invoice_number' => $validated['invoice_number'] ?? null,
            'date_input'     => $validated['date_input'],
        ]);

        // Atualizando a quantidade do produto
        $product = Product::findOrFail($validated['product_id']);
        $product->quantity += $validated['quantity_input'];
        $product->save();

        return redirect()
            ->route('productsInput.index')
            ->with('success', 'Entrada de produto registrada com sucesso!');
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
