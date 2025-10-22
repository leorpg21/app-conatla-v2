<?php

namespace App\Imports;

use App\Models\SFIndicadorSiete;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SFISieteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SFIndicadorSiete([
            'fecha_pago'   => $row['fecha_pago'] ?? null,
            'egreso'       => $row['egreso'] ?? null,
            'trm'          => $row['trm'] ?? null,
            'proyecto'     => $row['proyecto'] ?? null,
            'valor_egreso' => $row['valor_egreso'] ?? null,
            'usd'          => $row['usd'] ?? null,
            'contrato'     => $row['contrato'] ?? null,
            'cdp'          => $row['cdp'] ?? null,
            'rp'           => $row['rp'] ?? null,
            'link_anexo'   => $row['link_anexo'],
            'created_at'   => now(),
            'updated_at'   => now()
        ]);
    }

    public function rules(): array
    {
        return [
            '*.fecha_pago'   => ['required', 'string'],
            '*.egreso'       => ['required', 'numeric', 'min:0'],
            '*.trm'          => ['required', 'integer', 'min:0'],
            '*.proyecto'     => ['required', 'string', 'max:255'],
            '*.valor_egreso' => ['required', 'numeric', 'min:0'],
            '*.usd'          => ['required', 'numeric', 'min:0'],
            '*.contrato'     => ['required', 'string', 'min:0'],
            '*.cdp'          => ['required', 'integer', 'min:0'],
            '*.rp'           => ['required', 'integer', 'min:0'],
            '*.link_anexo'   => ['required', 'string']
        ];
    }
}
