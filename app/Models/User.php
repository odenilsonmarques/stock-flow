<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // Não é obrigatório, mas é recomendável se você quiser navegar no relacionamento de volta (user → suppliers)
    // Se você nunca precisar acessar os fornecedores a partir do usuário, não precisa criar.Mas é boa prática
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function productOutputs()
    {
        return $this->hasMany(ProductOutPut::class);
    }

    public function productInputs()
    {
        return $this->hasMany(ProductInput::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}