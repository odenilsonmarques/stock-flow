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
        'zip_code',
        'admin_id',

    ];

    //scopes para filtrar fornecedores pelo nome e número do documento
    public function scopeFilterName($query, $name)
    {
        // Aplica o filtro apenas se houver valor informado no campo de busca.
        // Caso contrário, a query segue sem alteração.
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
    }

    public function scopeFilterCpfCnpj($query, $numberDocument)
    {
        if ($numberDocument) {
            return $query->where('cpf_cnpj', 'like', '%' . $numberDocument . '%');
        }
    }

    // metodos para relacionamentos
    public function productInputs()
    {
        return $this->hasMany(ProductInput::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
