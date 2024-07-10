<?php

namespace App\Exports;

use App\Models\Informatica;
use App\Models\Laboratorio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Equipos_informaticosExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Informatica::with('laboratorio')->select('id', 'laboratorio_id', 'ip', 'disco_duro', 'placa_madre', 'procesador', 'memoria_ram', 'monitor', 'teclado', 'mouse', 'tarjeta_video', 'tarjeta_red', 'lectora')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'laboratorio_id',
            'ip',
            'disco_duro',
            'placa_madre',
            'procesador',
            'memoria_ram',
            'monitor',
            'teclado',
            'mouse',
            'tarjeta_video',
            'tarjeta_red',
            'lectora',
        ];
    }
}
