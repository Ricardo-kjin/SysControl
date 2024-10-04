<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_familia'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'familia_id');
    }
}
