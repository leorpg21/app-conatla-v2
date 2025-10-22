<?php

namespace App\Livewire\Forms\Formularios;

use App\Models\Direccion;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ValidarDirecciones extends Form
{
    public $id_direccion;

    #[Validate('string|max:60')]
    public $municipio;

    #[Validate('string|max:60')]
    public $corregimiento;

    #[Validate('string|max:60')]
    public $barrio;

    #[Validate('string|max:255')]
    public $direccion;



    public function loadDireccion($id_direccion)
    {
        $direccion = Direccion::find($id_direccion);
        $this->municipio = empty($direccion->municipio) ? 'No registra esta información' : $direccion->municipio;
        $this->corregimiento = empty($direccion->corregimiento) ? 'No registra esta información' : $direccion->corregimiento;
        $this->barrio = $direccion->barrio;
        $this->direccion = $direccion->direccion;

        $this->id_direccion = $id_direccion;
    }

    public function updateDireccion()
    {
        $direccion = Direccion::find($this->id_direccion);

        $direccion->update([
            'municipio'       => $this->municipio,
            'corregimiento'   => $this->corregimiento,
            'barrio'          => $this->barrio,
            'direccion'       => $this->direccion
        ]);
    }
}
