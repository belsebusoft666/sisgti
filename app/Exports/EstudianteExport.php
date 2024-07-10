<?php

namespace App\Exports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class EstudianteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estudiante::all();
    }
}
