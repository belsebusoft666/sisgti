<?php

namespace App\Exports;

use App\Models\Programa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProgramaExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Programa::select('id', 'nombre', 'cod_carrera', 'rd_resolucion')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Codigo Carrera',
            'Numero de resolución',
        ];
    }



    
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la primera fila (encabezados)
            1 => [
                'font' => [
                    'bold' => true,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FF0000',
                    ],
                ],
            ],
        ];
    }
}
