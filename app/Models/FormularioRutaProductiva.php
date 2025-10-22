<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormularioRutaProductiva extends Model
{
    protected $table = 'formulario_ruta_productiva';

    protected $fillable = [
        'pregunta_b5_1',
        'pregunta_b5_2',
        'pregunta_b5_3',
        'pregunta_b5_4',
        'pregunta_b5_5',
        'otro_servicio',
        'pregunta_c1',
        'pregunta_c2',
        'pregunta_d1',
        'observaciones_encuesta',
        'observacion',
        'estado',
        'seleccionado_muestra',
        'beneficiario_id',
        'encuestador_id'
    ];

    public function beneficiario(): BelongsTo
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    }

    public function encuestador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'encuestador_id');
    }
}
