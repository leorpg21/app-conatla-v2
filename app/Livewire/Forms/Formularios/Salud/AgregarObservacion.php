<?php

namespace App\Livewire\Forms\Formularios\Salud;

use App\Models\FormularioSalud;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AgregarObservacion extends Form
{
    public $id;

    #[Validate('required|min:3|max:500')]
    public $observacion = '';

    public $message = '';

    public function edit($id)
    {
        $this->reset();
        $this->id = $id;
        $beneficiario = FormularioSalud::find($id);
        $this->observacion = $beneficiario->observacion;
    }

    public function update()
    {
        $this->validate();
        $beneficiario = FormularioSalud::find($this->id);

        if($beneficiario)
        {
            $beneficiario->update([
                'observacion' => $this->observacion,
                'estado' => 'gestionado'
            ]);

            $this->message = 'success';
        }else
        {
            $this->message = 'error';
        }

    }
}
