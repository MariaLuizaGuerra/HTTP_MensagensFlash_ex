<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

   public function categorias()
{
    return $this->hasMany(Categoria::class);
}

public function produtos()
{
    return $this->hasMany(Produto::class);
}
}
