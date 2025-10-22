<?php

namespace App\Exports;

use App\Models\FormularioEspacioProtector;
use Maatwebsite\Excel\Concerns\FromCollection;

class EspacioProtectorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioEspacioProtector::all();
    }
}
