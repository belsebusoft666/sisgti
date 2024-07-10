<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;

    protected $table = 'componente'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'Id'; // Nombre de la clave primaria

    public $timestamps = true; // Habilita el uso de timestamps

    // Definir los nombres personalizados de las columnas de timestamp
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdatedAt';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'Descripcion', 'Marca', 'Modelo', 'Serie', 'FkTipoComponente', 'UsuarioCreador', 'UsuarioModificador', 'CreatedAt', 'UpdatedAt', 'DelatedAt'
    ];

    // Relación con el modelo TipoComponente
    public function tipoComponente()
    {
        return $this->belongsTo(TipoComponente::class, 'FkTipoComponente'); // Define la relación con la clave FkTipoComponente
    }

    // Relación con el modelo Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'Marca'); // Define la relación con la clave Marca
    }
}

