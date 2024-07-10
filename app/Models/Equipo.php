<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo'; // Nombre de la tabla en la base de datos

    // Relación con el modelo Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'Marca'); // Define la relación con la clave Marca
    }

    // Relación con el modelo Laboratorio
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, 'FKLaboratorio'); // Define la relación con la clave FKLaboratorio
    }

    // Relación con el modelo Componente
    public function componente()
    {
        return $this->belongsTo(Componente::class, 'FKComponente'); // Define la relación con la clave FKComponente
    }

    // Relación con el modelo TipoEquipo
    public function tipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'FkTipoEquipo'); // Define la relación con la clave FkTipoEquipo
    }
}

