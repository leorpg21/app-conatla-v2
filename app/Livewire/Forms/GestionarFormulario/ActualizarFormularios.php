<?php

namespace App\Livewire\Forms\GestionarFormulario;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ActualizarFormularios extends Form
{
    public $id;
    // Validamos que solo pueda tener permisos validos, si en caso se llega a seleccionar
    #[Validate([
        'formularios.*' => 'in:editar_formulario_rumv,editar_formulario_educacion,editar_formulario_salud,editar_formulario_empleabilidad,editar_formulario_ruta_productiva,editar_formulario_atencion_campo,editar_formulario_formacion_trabajo,editar_formulario_violencia_genero,editar_formulario_promocion_prevencion,editar_formulario_sisben,editar_formulario_espacio_protector,editar_formulario_psicosocial']
    )]
    public $formularios = [];
    
    public $message = '';
    
    public function edit($id)
    {
        $this->id = $id;
        $usuario = User::find($id);
        $this->formularios = $usuario->getPermissionNames();

    }

    public function update()
    {
        $usuario = User::find($this->id);
        
        if($this->formularios)
        {
            $this->validate();


            $usuario->syncPermissions($this->formularios);

            $usuario->save();

            $this->message = 'success';
            
        }else
        {
            $usuario->syncPermissions($this->formularios);

            $usuario->save();
            
            $this->message = 'success_delete';
            
        }
    }

}
