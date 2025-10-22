<?php

namespace App\Exports;

use App\Models\FormularioRUMV;
use Maatwebsite\Excel\Concerns\FromCollection;

class RumvExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioRUMV::with('beneficiario')
            ->get()
            ->map(function($formulario){
                return [
                    'id' => $formulario->id,
                    'nombre' => $formulario->beneficiario->nombre,
                    'tipo_documento' => $formulario->beneficiario->documento->tipo_documento,
                    'numero_documento' => $formulario->beneficiario->documento->numero_documento,
                    'edad' => $formulario->beneficiario->edad,
                    'pais_nacimiento' => $formulario->beneficiario->pais_nacimiento,
                    'genero' => $formulario->beneficiario->genero,
                    'tipo_servicio_prestado' => $formulario->beneficiario->tipo_servicio_prestado,
                    'centro_servicio' => $formulario->beneficiario->centro_servicio,
                    'indicador_asociado' => $formulario->beneficiario->indicador_asociado,
                    'fecha_prestacion_servicio' => $formulario->beneficiario->fecha_prestacion_servicio,
                    'correo' => $formulario->beneficiario->correo,
                    'tipo_poblacion_vulnerable' => $formulario->beneficiario->tipo_poblacion_vulnerable,
                    'otra_poblacion_vulnerable' => $formulario->beneficiario->otra_poblacion_vulnerable,
                    'municipio' => $formulario->beneficiario->direccion->municipio,
                    'corregimiento' => $formulario->beneficiario->direccion->corregimiento,
                    'barrio' => $formulario->beneficiario->direccion->barrio,
                    'direccion' => $formulario->beneficiario->direccion->direccion,
                    'pregunta_b1_1' => $formulario->pregunta_b1_1,
                    'pregunta_b1_2' => $formulario->pregunta_b1_2,
                    'pregunta_b1_3' => $formulario->pregunta_b1_3,
                    'pregunta_b1_4' => $formulario->pregunta_b1_4,
                    'otro_servicio' => $formulario->otro_servicio,
                    'pregunta_c1' => $formulario->pregunta_c1,
                    'pregunta_c2' => $formulario->pregunta_c2,
                    'pregunta_d1' => $formulario->pregunta_d1,
                    'observaciones_encuesta' => $formulario->observaciones_encuesta,
                    'observacion' => $formulario->observacion,
                    'estado' => $formulario->estado,
                    'seleccionado_muestra' => $formulario->seleccionado_muestra,
                ];
            });
    }

    public function headings() : array
    {
        return [
            'item',
            'Nombre del beneficiario/encuestado',
            'Tipo de Identificación',
            '# de identidad del beneficiario del servicio',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];
    }
}
