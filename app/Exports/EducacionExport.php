<?php

namespace App\Exports;

use App\Models\FormularioEducacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class EducacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioEducacion::all();
    }
}
