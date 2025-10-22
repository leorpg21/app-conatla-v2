<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LCInfraestructura extends Model
{
    protected $table = 'lc_infraestructura';

    protected $fillable = [
        'adecuacion_infraestructura',
        'cantidad_reportada',
        'unidad_medida',
        'cantidad_verificada',
        'estado',
        'observacion'
    ];
}
