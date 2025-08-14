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
        'name',
        'description',
        'product_number',
        'minimum_quantity',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productOutPuts()
    {
        return $this->hasMany(ProductOutPuts::class);
    }

    public function productInputs()
    {
        return $this->hasMany(ProductInputs::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
