<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;

    protected $table = 'tipoequipo'; // Nombre de la tabla en la base de datos

    public $timestamps = false; // Desactiva los campos de timestamp por defecto
}

