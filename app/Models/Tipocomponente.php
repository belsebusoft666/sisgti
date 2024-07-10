<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComponente extends Model
{
    use HasFactory;

    protected $table = 'tipocomponente';

    public $timestamps = false;

    public function tipoequipo()
    {
        return $this->belongsTo(tipoequipo::class, 'idtipoequipo');
    }
}
