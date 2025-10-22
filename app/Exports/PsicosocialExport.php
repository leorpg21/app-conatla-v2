<?php

namespace App\Exports;

use App\Models\FormularioPsicosocial;
use Maatwebsite\Excel\Concerns\FromCollection;

class PsicosocialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioPsicosocial::all();
    }
}
