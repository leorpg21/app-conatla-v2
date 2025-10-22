<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Documento;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable = [
        'nombre',
        'genero',
        'edad',
        'numero_telefono',
        'correo',
        'tipo_poblacion_vulnerable',
        'otra_poblacion_vulnerable',
        'tipo_servicio_prestado',
        'fecha_prestacion_servicio',
        'pais_nacimiento',
        'centro_servicio',
        'indicador_asociado'
    ];

    public $timestamps = false; 

    public function documento() : HasOne {
        return $this->hasOne(Documento::class, 'beneficiario_id');
    }

    public function direccion() : HasOne {
        return $this->hasOne(Direccion::class, 'beneficiario_id');
    }
}
