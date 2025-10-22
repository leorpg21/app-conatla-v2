<?php

namespace App\Exports;

use App\Models\FormularioViolenciaGenero;
use Maatwebsite\Excel\Concerns\FromCollection;

class ViolenciaGeneroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioViolenciaGenero::all();
    }
}
