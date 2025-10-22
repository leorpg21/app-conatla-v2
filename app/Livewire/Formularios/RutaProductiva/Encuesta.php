<?php

namespace App\Livewire\Formularios\RutaProductiva;

use App\Livewire\Forms\Formularios\RutaProductiva\GestionarFormulario;
use App\Livewire\Forms\Formularios\ValidarBeneficiarios;
use App\Livewire\Forms\Formularios\ValidarDirecciones;
use App\Livewire\Forms\Formularios\ValidarDocumentos;
use App\Models\FormularioRutaProductiva;
use Illuminate\Validation\ValidationException;

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
    public GestionarFormulario $ruta_productiva;
    
    public function mount($id)
    {
        $formulario = FormularioRutaProductiva::find($id);
        $this->ruta_productiva->loadPreguntasForm($id);
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
            $this->ruta_productiva->validate();
        } catch (ValidationException $e) {
            $this->warningMessage[] = 'Por favor, asegúrate de haber completado correctamente todos los campos';
        }

        // Se realizan dos veces la validación, la primera para enviar un mensaje y la de ahora para validar para los registros a la base de datos

        $this->beneficiario->validate();
        $this->direccion->validate();
        $this->documento->validate();
        $this->ruta_productiva->validate();
        
        try {

            $this->documento->updateDocumento();
            $this->direccion->updateDireccion();
            $this->beneficiario->updateBeneficiario();
            $this->ruta_productiva->updateFormulario();

            session()->flash('success', 'Se ha realizado la encuesta satisfactoriamente');
            return $this->redirect(route('ruta_productiva.index'), navigate: true);
        } catch (\Exception $e) {
            $this->errorMessage[] = 'Ocurrió un error inesperado.' . $e;

        }
        
    }
    
    public function render()
    {
        return view('livewire.formularios.ruta-productiva.encuesta');
    }
}
