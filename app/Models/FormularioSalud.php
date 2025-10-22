<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormularioSalud extends Model
{
    protected $table = 'formulario_salud';

    protected $fillable = [
        'pregunta_b3_1',
        'pregunta_b3_2',
        'pregunta_b3_3',
        'pregunta_b3_4',
        'pregunta_b3_5',
        'pregunta_b3_6',
        'pregunta_b3_7',
        'pregunta_b3_8',
        'pregunta_b3_9',
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
