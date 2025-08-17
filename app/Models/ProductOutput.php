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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
