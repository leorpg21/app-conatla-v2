<?php

namespace App\Exports;

use App\Models\FormularioSisben;
use Maatwebsite\Excel\Concerns\FromCollection;

class SisbenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioSisben::all();
    }
}
