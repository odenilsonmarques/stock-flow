<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'admin_id',
        'quantity_output',
        'destiny',
        'responsible_for_receiving',
    ];



    // Scope para filtrar saída de produtos pelo nome do produto,
    // destino ou nome do recebedor
    public function scopeFilterBySearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                // Busca no produto relacionado (nome ou código)
                $q->whereHas('product', function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('product_number', 'like', "%{$search}%");
                })
                    // Busca nas colunas da própria tabela product_outputs
                    // Como é na própria tabela, não precisa do whereHas
                    ->orWhere('destiny', 'like', "%{$search}%")
                    ->orWhere('responsible_for_receiving', 'like', "%{$search}%");
            });
        }
    }



    // metodos relacionais
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
