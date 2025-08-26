<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'uuid',
        'name',
        'description',
        'product_number',
        'minimum_quantity',
        'quantity',         // saldo atual em estoque
    ];

    // Scope para filtrar produtos pelo nome ou número
    public function scopeFilterBySearch($query, $search)
    {
        // Aplica o filtro apenas se houver valor informado no campo de busca.
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('product_number', 'like', "%{$search}%");
            });
        }
    }



    // metodos para relacionamentos
    public function productOutPuts()
    {
        return $this->hasMany(ProductOutPut::class);
    }

    public function productInputs()
    {
        return $this->hasMany(ProductInput::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
