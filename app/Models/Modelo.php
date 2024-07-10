<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelo'; // Nombre de la tabla en la base de datos

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id'); // Relación con el modelo Marca mediante la clave externa marca_id
    }
}

