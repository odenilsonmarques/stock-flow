<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'admin_id',
        'quantity_input',
        'invoice_number',
        'date_input',
    ];

    // Scope para filtrar entradas de produtos pelo nome do produto,
    // número do produto ou nome do fornecedor

    public function scopeFilterBySearch($query, $search)
    {
        // Aplica o filtro apenas se houver valor informado no campo de busca.
        if ($search) {
            return $query->where(function ($q) use ($search) {
                // Busca pelo nome ou código do produto
                $q->whereHas('product', function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('product_number', 'like', "%{$search}%");
                })
                    // Ou busca pelo nome do fornecedor
                    ->orWhereHas('supplier', function ($sub) use ($search) {
                        $sub->where('name', 'like', "%{$search}%");
                    });
            });
        }
    }


    // metodos para relacionamentos
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
