<?php

namespace App\Exports;

use App\Models\FormularioAtencionCampo;
use Maatwebsite\Excel\Concerns\FromCollection;

class AtencionCampoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioAtencionCampo::all();
    }
}
