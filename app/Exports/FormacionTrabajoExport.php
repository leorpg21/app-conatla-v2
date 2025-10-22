<?php

namespace App\Exports;

use App\Models\FormularioFormacionTrabajo;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormacionTrabajoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioFormacionTrabajo::all();
    }
}
