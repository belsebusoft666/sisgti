<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    protected $table = 'caracteristica'; // Nombre de la tabla en la base de datos

    public $timestamps = false; // Desactiva el uso de timestamps created_at y updated_at
}

