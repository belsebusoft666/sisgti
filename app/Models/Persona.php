<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'persona'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombres',
        'apellidopaterno',
        'apellidomaterno',
        'numerodocumento',
        'tipodocumento'
    ]; // Campos que se pueden asignar de manera masiva

}

