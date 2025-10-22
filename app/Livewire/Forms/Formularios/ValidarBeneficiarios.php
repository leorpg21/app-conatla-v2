<?php

namespace App\Livewire\Forms\Formularios;

use App\Models\Beneficiario;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ValidarBeneficiarios extends Form
{
    public $id_beneficiario;

    #[Validate('required|string|min:5|max:100')]
    public $nombre = '';
    
    #[Validate('required|string|in:masculino,femenino,intersexual,otro')]
    public $genero = '';

    #[Validate('required|integer|between:0,130')]
    public $edad = '';

    #[Validate('required|string|max:80')]
    public $numero_telefono;

    #[Validate('string|max:80')]
    public $correo;

    #[Validate('string|max:80')]
    public $tipo_poblacion_vulnerable;

    #[Validate('string|max:80')]
    public $otra_poblacion_vulnerable;

    #[Validate('string|max:30')]
    public $pais_nacimiento;

    public function loadBeneficiario($id_beneficiario)
    {
        $beneficiario = Beneficiario::find($id_beneficiario);
        $this->nombre = $beneficiario->nombre;
        $this->genero = $beneficiario->genero;
        $this->edad = $beneficiario->edad;
        $this->numero_telefono = $beneficiario->numero_telefono;
        $this->correo = $beneficiario->correo;
        $this->tipo_poblacion_vulnerable = $beneficiario->tipo_poblacion_vulnerable;
        $this->otra_poblacion_vulnerable = $beneficiario->otra_poblacion_vulnerable;
        $this->pais_nacimiento = $beneficiario->pais_nacimiento;

        $this->id_beneficiario = $id_beneficiario;
        
    }

    public function updateBeneficiario()
    {
        $beneficiario = Beneficiario::find($this->id_beneficiario);

        $beneficiario->update([
            'nombre'                    => $this->nombre,
            'genero'                    => $this->genero, 
            'edad'                      => $this->edad,           
            'numero_telefono'           => $this->numero_telefono,
            'correo'                    => $this->correo,
            'tipo_poblacion_vulnerable' => $this->tipo_poblacion_vulnerable,
            'otra_poblacion_vulnerable' => $this->otra_poblacion_vulnerable,
            'pais_nacimiento'           => $this->pais_nacimiento
        ]);
    }
}

