<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ReportController extends Controller
{
    public function productMovements(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate   = $request->input('end_date', now()->endOfMonth()->toDateString());

        $report = Product::select('products.id', 'products.name')
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

        return view('reports.products', compact('report', 'startDate', 'endDate'));
    }
}
