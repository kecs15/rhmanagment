<?php

namespace App\Exports;

use App\Candidato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CandidatosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Candidato::join('puestos', 'candidatos.puesto_id', '=', 'puestos.id')
            ->join('departamentos', 'puestos.departamento_id', '=', 'departamentos.id')
            ->select('candidatos.id', 'candidatos.nombre', 'candidatos.cedula', 'puestos.nombre as puesto_nombre','departamentos.nombre as departamento_nombre', 'candidatos.created_at')
            ->where('candidatos.estado', '=', 'Pendiente')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Cedula',
            'Puesto',
            'Departamento',
            'Fecha'
        ];
    }
}
