<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'type_supplier',
        'cpf_cnpj',
        'email',
        'phone',
        'address',
        'number',
        'city',
        'district',
        'state',
        'zip_code'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
