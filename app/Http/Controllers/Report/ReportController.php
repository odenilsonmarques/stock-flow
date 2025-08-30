<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInput;
use App\Models\ProductOutput;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    //metodo para exibir a view de relatório básico de produtos
    public function reportBasicProduct(Request $request)
    {
        // Normaliza datas (com hora cheia para não perder registros no último dia)
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : now()->endOfDay();

        // Consulta
        $report = Product::query()
            ->select('products.id', 'products.name')
            ->leftJoin('product_inputs', function ($join) use ($startDate, $endDate) {
                $join->on('products.id', '=', 'product_inputs.product_id')
                    ->whereBetween('product_inputs.created_at', [$startDate, $endDate]);
            })
            ->leftJoin('product_outputs', function ($join) use ($startDate, $endDate) {
                $join->on('products.id', '=', 'product_outputs.product_id')
                    ->whereBetween('product_outputs.created_at', [$startDate, $endDate]);
            })
            ->selectRaw('
            COALESCE(SUM(product_inputs.quantity_input), 0) as total_inputs,
            COALESCE(SUM(product_outputs.quantity_output), 0) as total_outputs,
            (COALESCE(SUM(product_inputs.quantity_input), 0) - COALESCE(SUM(product_outputs.quantity_output), 0)) as saldo
        ')
            ->groupBy('products.id', 'products.name')
            ->paginate(5);

        return view('reports.report-basic-product', [
            'report'    => $report,
            'startDate' => $startDate->toDateString(),
            'endDate'   => $endDate->toDateString(),
        ]);
    }

    //metodo para gerar o PDF do relatório básico
    public function reportBasicPdf(Request $request)
    {
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : now()->endOfDay();

        // Consulta dos produtos
        $report = Product::query()
            ->select('products.id', 'products.name')
            ->leftJoin('product_inputs', function ($join) use ($startDate, $endDate) {
                $join->on('products.id', '=', 'product_inputs.product_id')
                    ->whereBetween('product_inputs.created_at', [$startDate, $endDate]);
            })
            ->leftJoin('product_outputs', function ($join) use ($startDate, $endDate) {
                $join->on('products.id', '=', 'product_outputs.product_id')
                    ->whereBetween('product_outputs.created_at', [$startDate, $endDate]);
            })
            ->selectRaw('
            COALESCE(SUM(product_inputs.quantity_input), 0) as total_inputs,
            COALESCE(SUM(product_outputs.quantity_output), 0) as total_outputs,
            (COALESCE(SUM(product_inputs.quantity_input), 0) - COALESCE(SUM(product_outputs.quantity_output), 0)) as saldo
        ')
            ->groupBy('products.id', 'products.name')
            ->get();

        $pdf = PDF::loadView('reports.report-basic-pdf', compact('report', 'startDate', 'endDate'));

        // Força download do PDF
        return $pdf->download('relatorio_basico_de_produtos.pdf');
    }



    //metodo para exibir a view de relatório detalhado de produtos
    public function reportDetailedProducts(Request $request)
    {
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : now()->endOfDay();

        // Entradas
        $inputs = DB::table('product_inputs')
            ->select([
                'product_inputs.created_at as date',
                'products.name as product_name',
                DB::raw("'entrada' as type"),
                'product_inputs.quantity_input as quantity',
                'suppliers.name as supplier_name',
                DB::raw("NULL as destiny"),
                'users.name as user_name',
            ])
            ->join('products', 'products.id', '=', 'product_inputs.product_id')
            ->leftJoin('suppliers', 'suppliers.id', '=', 'product_inputs.supplier_id')
            ->leftJoin('users', 'users.id', '=', 'product_inputs.admin_id')
            ->whereBetween('product_inputs.created_at', [$startDate, $endDate]);

        // Saídas
        $outputs = DB::table('product_outputs')
            ->select([
                'product_outputs.created_at as date',
                'products.name as product_name',
                DB::raw("'saída' as type"),
                'product_outputs.quantity_output as quantity',
                DB::raw("NULL as supplier_name"),
                'product_outputs.destiny as destiny',
                'users.name as user_name',
            ])
            ->join('products', 'products.id', '=', 'product_outputs.product_id')
            ->leftJoin('users', 'users.id', '=', 'product_outputs.admin_id')
            ->whereBetween('product_outputs.created_at', [$startDate, $endDate]);

        // UnionAll
        $movements = $inputs->unionAll($outputs);

        // Subquery para ordenar e paginar
        $report = DB::query()
            ->fromSub($movements, 'movements')
            ->orderByDesc('date')
            ->paginate(10);

        return view('reports.report-detailed-product', [
            'movements' => $report,
            'startDate' => $startDate->toDateString(),
            'endDate'   => $endDate->toDateString(),
        ]);
    }

    //metodo para gerar o PDF do relatório detalhado de produtos
    public function reportDetailedPdf(Request $request)
    {
        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : now()->startOfMonth();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : now()->endOfDay();

        // Entradas
        $inputs = DB::table('product_inputs')
            ->select([
                'product_inputs.created_at as date',
                'products.name as product_name',
                DB::raw("'entrada' as type"),
                'product_inputs.quantity_input as quantity',
                'suppliers.name as supplier_name',
                DB::raw("NULL as destiny"),
                'users.name as user_name',
            ])
            ->join('products', 'products.id', '=', 'product_inputs.product_id')
            ->leftJoin('suppliers', 'suppliers.id', '=', 'product_inputs.supplier_id')
            ->leftJoin('users', 'users.id', '=', 'product_inputs.admin_id')
            ->whereBetween('product_inputs.created_at', [$startDate, $endDate]);

        // Saídas
        $outputs = DB::table('product_outputs')
            ->select([
                'product_outputs.created_at as date',
                'products.name as product_name',
                DB::raw("'saída' as type"),
                'product_outputs.quantity_output as quantity',
                DB::raw("NULL as supplier_name"),
                'product_outputs.destiny as destiny',
                'users.name as user_name',
            ])
            ->join('products', 'products.id', '=', 'product_outputs.product_id')
            ->leftJoin('users', 'users.id', '=', 'product_outputs.admin_id')
            ->whereBetween('product_outputs.created_at', [$startDate, $endDate]);

        // UnionAll
        $movements = $inputs->unionAll($outputs);

        // Obter todos os registros ordenados
        $report = DB::query()
            ->fromSub($movements, 'movements')
            ->orderByDesc('date')
            ->get();

        // Gerar PDF
        $pdf = Pdf::loadView('reports.report-detailed-pdf', [
            'movements' => $report,
            'startDate' => $startDate->format('d/m/Y'),
            'endDate'   => $endDate->format('d/m/Y'),
        ]);

        return $pdf->download('relatorio_detalhado_demovimentos_de_produtos.pdf');
    }
}
