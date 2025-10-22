<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SFIndicadorOcho extends Model
{
    protected $table = 'sf_indicador_ocho';

    protected $fillable = [
        'fecha_pago',
        'egreso',
        'trm',
        'proyecto',
        'valor_egreso',
        'usd',
        'contrato',
        'cdp',
        'rp',
        'link_anexo',
        'verificado',
        'observacion'
    ];

}
