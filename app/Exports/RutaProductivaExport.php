<?php

namespace App\Exports;

use App\Models\FormularioRutaProductiva;
use Maatwebsite\Excel\Concerns\FromCollection;

class RutaProductivaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioRutaProductiva::all();
    }
}
