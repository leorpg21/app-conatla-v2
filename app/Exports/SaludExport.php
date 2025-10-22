<?php

namespace App\Exports;

use App\Models\FormularioSalud;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaludExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioSalud::all();
    }
}
