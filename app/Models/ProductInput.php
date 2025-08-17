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
        'responsible',
    ];


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
