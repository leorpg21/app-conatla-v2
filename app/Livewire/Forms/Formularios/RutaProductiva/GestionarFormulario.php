<?php

namespace App\Livewire\Forms\Formularios\RutaProductiva;

use App\Models\FormularioRutaProductiva;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GestionarFormulario extends Form
{
    public $id_formulario;

    #[Validate('required|string|in:si,no')]
    public $pregunta_b5_1;

    #[Validate('required|string|in:si,no')]
    public $pregunta_b5_2;

    #[Validate('required|string|in:si,no')]
    public $pregunta_b5_3;
    
    #[Validate('required|string|in:si,no')]
    public $pregunta_b5_4;

    #[Validate('required|string|in:si,no')]
    public $pregunta_b5_5;

    #[Validate('string|max:80')]
    public $otro_servicio;

    #[Validate('required|string|in:si,no')]
    public $pregunta_c1;

    #[Validate('required|string|in:si,no')]
    public $pregunta_c2;

    #[Validate('string|max:500')]
    public $pregunta_d1;

    #[Validate('string|max:500')]
    public $observaciones_encuesta;

    public function loadPreguntasForm($id_formulario)
    { 
        $formulario = FormularioRutaProductiva::find($id_formulario);
        $this->pregunta_b5_1 = $formulario->pregunta_b5_1;
        $this->pregunta_b5_2 = $formulario->pregunta_b5_2;
        $this->pregunta_b5_3 = $formulario->pregunta_b5_3;
        $this->pregunta_b5_4 = $formulario->pregunta_b5_4;
        $this->pregunta_b5_5 = $formulario->pregunta_b5_5;
        $this->otro_servicio = $formulario->otro_servicio;
        $this->pregunta_c1 = $formulario->pregunta_c1;
        $this->pregunta_c2 = $formulario->pregunta_c2;
        $this->pregunta_d1 = $formulario->pregunta_d1;
        $this->observaciones_encuesta = $formulario->observaciones_encuesta;

        $this->id_formulario = $id_formulario;
    }

    public function updateFormulario()
    {
        $formulario = FormularioRutaProductiva::find($this->id_formulario);

        $formulario->update([
            'pregunta_b5_1'          => $this->pregunta_b5_1,
            'pregunta_b5_2'          => $this->pregunta_b5_2,
            'pregunta_b5_3'          => $this->pregunta_b5_3,
            'pregunta_b5_4'          => $this->pregunta_b5_4,
            'pregunta_b5_5'          => $this->pregunta_b5_5,
            'otro_servicio'          => $this->otro_servicio,
            'pregunta_c1'            => $this->pregunta_c1,
            'pregunta_c2'            => $this->pregunta_c2,
            'pregunta_d1'            => $this->pregunta_d1,
            'observaciones_encuesta' => $this->observaciones_encuesta,
            'observacion'            => '',
            'estado'                 => 'encuestado',
            'update_at'              => now()
        ]);

    }
}
