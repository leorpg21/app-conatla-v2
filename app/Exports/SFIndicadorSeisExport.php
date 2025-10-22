<?php

namespace App\Exports;

use App\Models\SFIndicadorSeis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SFIndicadorSeisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SFIndicadorSeis::all([
            'fecha_pago',
            'egreso',
            'trm',
            'proyecto',
            'valor_egreso',
            'usd',
            'contrato',
            'cdp',
            'rp',
            'link_anexo',
            'verificado',
            'observacion'
        ]);
    }

    public function headings() : array
    {
        return [
            'FECHA PAGO',
            'EGRESO',
            'TRM',
            'PROYECTO',
            'VALOR EGRESO',
            'USD',
            'Contrato',
            'CDP',
            'RP',
            'Link de anexos',
            'Verificado',
            'Observación'
        ];
    }
}
