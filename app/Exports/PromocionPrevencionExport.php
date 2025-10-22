<?php

namespace App\Exports;

use App\Models\FormularioPromocionPrevencion;
use Maatwebsite\Excel\Concerns\FromCollection;

class PromocionPrevencionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioPromocionPrevencion::all();
    }
}
