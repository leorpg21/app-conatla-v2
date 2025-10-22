<?php

namespace App\Livewire\Formularios\Sisben;

use App\Models\FormularioSisben;
use Livewire\Component;

class VerEncuesta extends Component
{
    public $nombre;
    public $genero;
    public $edad;
    public $numero_telefono;
    public $correo;
    public $tipo_poblacion_vulnerable;
    public $otra_poblacion_vulnerable;
    public $tipo_servicio_prestado;
    public $fecha_prestacion_servicio;
    public $pais_nacimiento;

    public $municipio;
    public $corregimiento;
    public $barrio;
    public $direccion;

    public $tipo_documento;
    public $numero_documento;

    public $pregunta_b10_1;
    public $pregunta_b10_2;
    public $pregunta_b10_3;
    public $pregunta_b10_4;
    public $pregunta_b10_5;
    public $pregunta_b10_6;
    public $pregunta_b10_7;
    public $otro_servicio;
    public $pregunta_c1;
    public $pregunta_c2;
    public $pregunta_d1;
    public $observaciones_encuesta;
    public $observacion;
    

    public function mount($id)
    {
        $formulario = FormularioSisben::find($id);
        $this->nombre = !empty($formulario->beneficiario->nombre) ? $formulario->beneficiario->nombre : 'Información no registrada';
        $this->genero = !empty($formulario->beneficiario->genero) ? $formulario->beneficiario->genero : 'Información no registrada';
        $this->edad = !empty($formulario->beneficiario->edad) ? $formulario->beneficiario->edad : 'Información no registrada';
        $this->numero_telefono = !empty($formulario->beneficiario->numero_telefono) ? $formulario->beneficiario->numero_telefono : 'Información no registrada';
        $this->correo = !empty($formulario->beneficiario->correo) ? $formulario->beneficiario->correo : 'Información no registrada';
        $this->tipo_poblacion_vulnerable = !empty($formulario->beneficiario->tipo_poblacion_vulnerable) ? $formulario->beneficiario->tipo_poblacion_vulnerable : 'Información no registrada';
        $this->otra_poblacion_vulnerable = !empty($formulario->beneficiario->otra_poblacion_vulnerable) ? $formulario->beneficiario->otra_poblacion_vulnerable : 'Información no registrada';
        $this->tipo_servicio_prestado = !empty($formulario->beneficiario->tipo_servicio_prestado) ? $formulario->beneficiario->tipo_servicio_prestado : 'Información no registrada';
        $this->fecha_prestacion_servicio = !empty($formulario->beneficiario->fecha_prestacion_servicio) ? $formulario->beneficiario->fecha_prestacion_servicio : 'Información no registrada';
        $this->pais_nacimiento = !empty($formulario->beneficiario->pais_nacimiento) ? $formulario->beneficiario->pais_nacimiento : 'Información no registrada';

        $this->municipio = !empty($formulario->beneficiario->direccion->municipio) ? $formulario->beneficiario->direccion->municipio : 'Información no registrada';
        $this->corregimiento = !empty($formulario->beneficiario->direccion->corregimiento) ? $formulario->beneficiario->direccion->corregimiento : 'Información no registrada';
        $this->barrio = !empty($formulario->beneficiario->direccion->barrio) ? $formulario->beneficiario->direccion->barrio : 'Información no registrada';
        $this->direccion = !empty($formulario->beneficiario->direccion->direccion) ? $formulario->beneficiario->direccion->direccion : 'Información no registrada';

        $this->tipo_documento = !empty($formulario->beneficiario->documento->tipo_documento) ? $formulario->beneficiario->documento->tipo_documento : 'Información no registrada';
        $this->numero_documento = !empty($formulario->beneficiario->documento->numero_documento) ? $formulario->beneficiario->documento->numero_documento : 'Información no registrada';

        $this->pregunta_b10_1 = !empty($formulario->pregunta_b10_1) ? $formulario->pregunta_b10_1 : 'Información no registrada';
        $this->pregunta_b10_2 = !empty($formulario->pregunta_b10_2) ? $formulario->pregunta_b10_2 : 'Información no registrada';
        $this->pregunta_b10_3 = !empty($formulario->pregunta_b10_3) ? $formulario->pregunta_b10_3 : 'Información no registrada';
        $this->pregunta_b10_4 = !empty($formulario->pregunta_b10_4) ? $formulario->pregunta_b10_4 : 'Información no registrada';
        $this->pregunta_b10_5 = !empty($formulario->pregunta_b10_5) ? $formulario->pregunta_b10_5 : 'Información no registrada';
        $this->pregunta_b10_6 = !empty($formulario->pregunta_b10_6) ? $formulario->pregunta_b10_6 : 'Información no registrada';
        $this->pregunta_b10_7 = !empty($formulario->pregunta_b10_7) ? $formulario->pregunta_b10_7 : 'Información no registrada';
        $this->otro_servicio = !empty($formulario->otro_servicio) ? $formulario->otro_servicio : 'Información no registrada';
        $this->pregunta_c1 = !empty($formulario->pregunta_c1) ? $formulario->pregunta_c1 : 'Información no registrada';
        $this->pregunta_c2 = !empty($formulario->pregunta_c2) ? $formulario->pregunta_c2 : 'Información no registrada';
        $this->pregunta_d1 = !empty($formulario->pregunta_d1) ? $formulario->pregunta_d1 : 'Información no registrada';
        $this->observaciones_encuesta = !empty($formulario->observaciones_encuesta) ? $formulario->observaciones_encuesta : 'Información no registrada';
        $this->observacion = !empty($formulario->observacion) ? $formulario->observacion : 'Información no registrada';
    }

    public function render()
    {
        return view('livewire.formularios.sisben.ver-encuesta');
    }
}
