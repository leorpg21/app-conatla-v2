<?php

namespace App\Livewire\Formularios\FormacionTrabajo;

use App\Livewire\Forms\Formularios\FormacionTrabajo\GestionarFormulario;
use App\Livewire\Forms\Formularios\ValidarBeneficiarios;
use App\Livewire\Forms\Formularios\ValidarDirecciones;
use App\Livewire\Forms\Formularios\ValidarDocumentos;
use Illuminate\Validation\ValidationException;
use App\Models\FormularioFormacionTrabajo;
use Livewire\Component;

class Encuesta extends Component
{
    public $warningMessage = null;
    public $errorMessage = null;

    public $listaMunicipios = [];
    public $listaCorregimientos = [];

    public ValidarBeneficiarios $beneficiario;
    public ValidarDirecciones $direccion;
    public ValidarDocumentos $documento;
    public GestionarFormulario $formacion_trabajo;
    
    public function mount($id)
    {
        $formulario = FormularioFormacionTrabajo::find($id);
        $this->formacion_trabajo->loadPreguntasForm($id);
        $this->beneficiario->loadBeneficiario($formulario->beneficiario_id);
        $this->direccion->loadDireccion($formulario->beneficiario->direccion->id);
        $this->documento->loadDocumento($formulario->beneficiario->documento->id);
        $this->listaMunicipios  = config('form_selects.municipio');
        $this->listaCorregimientos[] = $this->direccion->corregimiento;
    }
    public function actualizarMunicipios()
    {
        $this->listaCorregimientos = $this->listaMunicipios[$this->direccion->municipio]['corregimientos'] ?? [];
    }
    
    public function update()
    {
        
        try {
            $this->beneficiario->validate();
            $this->direccion->validate();
            $this->documento->validate();
            $this->formacion_trabajo->validate();
        } catch (ValidationException $e) {
            $this->warningMessage[] = 'Por favor, asegúrate de haber completado correctamente todos los campos';
        }

        // Se realizan dos veces la validación, la primera para enviar un mensaje y la de ahora para validar para los registros a la base de datos

        $this->beneficiario->validate();
        $this->direccion->validate();
        $this->documento->validate();
        $this->formacion_trabajo->validate();
        
        try {

            $this->documento->updateDocumento();
            $this->direccion->updateDireccion();
            $this->beneficiario->updateBeneficiario();
            $this->formacion_trabajo->updateFormulario();

            session()->flash('success', 'Se ha realizado la encuesta satisfactoriamente');
            return $this->redirect(route('formacion_trabajo.index'), navigate: true);
        } catch (\Exception $e) {
            $this->errorMessage[] = 'Ocurrió un error inesperado.' . $e;

        }
        
    }
    
    public function render()
    {
        return view('livewire.formularios.formacion-trabajo.encuesta');
    }
}
