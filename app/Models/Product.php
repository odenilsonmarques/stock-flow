<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'admin_id',
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

    public function productOutPuts()
    {
        return $this->hasMany(ProductOutPut::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
