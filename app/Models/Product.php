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

    //scopes para filtrar produtos pelo nome e número
    public function scopeFilterName($query, $name)
    {
        // Aplica o filtro apenas se houver valor informado no campo de busca.
        // Caso contrário, a query segue sem alteração.
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
    }

    public function scopeFilterNumber($query, $number)
    {
        if ($number) {
            return $query->where('product_number', 'like', '%' . $number . '%');
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
