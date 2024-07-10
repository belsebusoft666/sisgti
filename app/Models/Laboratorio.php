<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratorio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laboratorio'; // Nombre de la tabla en la base de datos

    // Relación con el modelo Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id'); // Define la relación con la clave persona_id
    }
}
