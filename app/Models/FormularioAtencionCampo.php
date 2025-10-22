<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class FormularioAtencionCampo extends Model
{
    protected $table = 'formulario_atencion_campo';

    protected $fillable = [
        'pregunta_b6_1',
        'otro_servicio',
        'pregunta_c1',
        'pregunta_c2',
        'pregunta_d1',
        'observaciones_encuesta',
        'observacion',
        'estado',
        'centro_servicio',
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
