<?php

namespace App\Exports;

use App\Models\LCInfraestructura;
use Maatwebsite\Excel\Concerns\FromCollection;

class InfraestructuraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LCInfraestructura::all();
    }
}
