<?php

namespace App\Livewire\GestionFormulario;

use App\Livewire\Forms\GestionarFormulario\ActualizarFormularios;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $abrirModalPermisos = false;
    public $gestores;
    
    public $successMessage = null;
    public $errorMessage = null;
    
    public ActualizarFormularios $actualizarFormularios;
    public $notifications = [];
    public $mis_formularios = [];
    public $formularios = [];

    public function mount()
    {
        $this->formularios = config('form_selects.formularios_asignar');
        $this->gestores = User::role('encuestador')->get();
    }

    public function edit($id)
    {
        $this->abrirModalPermisos = true;
        $this->actualizarFormularios->edit($id);

    }

    public function update()
    {
        $this->actualizarFormularios->update();
        if($this->actualizarFormularios->message == 'success')
        {
            $this->successMessage[] = 'Se ha actualizado los formularios correctamente!';
        }else if ('success_delete')
        {
            $this->successMessage[] = 'Se han eliminado los formularios correctamente!';
        }else
        {
            $this->errorMessage[] = 'Ha ocurrido un error';
        }
        $this->gestores = User::role('encuestador')->get();
    }

    public function render()
    {
        return view('livewire.gestion-formulario.index');
    }
}
