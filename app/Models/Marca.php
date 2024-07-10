<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marca'; // Nombre de la tabla en la base de datos

    // No se definen relaciones en este modelo, solo se establece el nombre de la tabla
}


