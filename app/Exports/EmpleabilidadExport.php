<?php

namespace App\Exports;

use App\Models\FormularioEmpleabilidad;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpleabilidadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioEmpleabilidad::all();
    }
}
