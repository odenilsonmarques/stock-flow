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
