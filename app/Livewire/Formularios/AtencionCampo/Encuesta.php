<?php

namespace App\Livewire\Formularios\AtencionCampo;

use App\Livewire\Forms\Formularios\AtencionCampo\GestionarFormulario;
use App\Livewire\Forms\Formularios\ValidarBeneficiarios;
use App\Livewire\Forms\Formularios\ValidarDirecciones;
use App\Livewire\Forms\Formularios\ValidarDocumentos;
use App\Models\FormularioAtencionCampo;
use Livewire\Component;

class Encuesta extends Component
{
    public $listaMunicipios = [];
    public $listaCorregimientos = [];

    public ValidarBeneficiarios $beneficiario;
    public ValidarDirecciones $direccion;
    public ValidarDocumentos $documento;
    public GestionarFormulario $atencion_campo;
    
    public function mount($id)
    {
        $formulario = FormularioAtencionCampo::find($id);
        $this->atencion_campo->loadPreguntasForm($id);
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
        $this->beneficiario->validate();
        $this->direccion->validate();
        $this->documento->validate();
        $this->atencion_campo->validate();

        try {
            $this->documento->updateDocumento();
            $this->direccion->updateDireccion();
            $this->beneficiario->updateBeneficiario();
            $this->atencion_campo->updateFormulario();

            return redirect()->route('atencion_campo.index')->with('success', 'Se ha realizado la encuesta satisfactoriamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Ha ocurrido un error');
        }
        
    }
    public function render()
    {
        return view('livewire.formularios.atencion-campo.encuesta');
    }
}
