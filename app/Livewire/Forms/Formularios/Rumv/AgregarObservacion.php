<?php

namespace App\Livewire\Forms\Formularios\Rumv;

use App\Models\FormularioRUMV;
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
        $beneficiario = FormularioRUMV::find($id);
        $this->observacion = $beneficiario->observacion;
    }

    public function update()
    {
        $this->validate();
        $beneficiario = FormularioRUMV::find($this->id);

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
