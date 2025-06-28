<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'supplier_id',
        'uuid',
        'product_number',
        'name',
        'description',
        'quantity',
        'confirm_quantity',
        'minimum_quantity',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
