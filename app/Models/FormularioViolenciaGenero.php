<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormularioViolenciaGenero extends Model
{
    protected $table = 'formulario_violencia_genero';

    protected $fillable = [
        'pregunta_b8_1',
        'pregunta_b8_2',
        'pregunta_b8_3',
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
