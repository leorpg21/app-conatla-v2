<?php

namespace App\Livewire\GestionUsuario;

use App\Livewire\Forms\GestionarUsuario\ActualizarPassword;
use App\Livewire\Forms\GestionarUsuario\CrearUsuario;
use App\Livewire\Forms\GestionarUsuario\EditarUsuario;
use App\Livewire\Forms\GestionarUsuario\EliminarUsuario;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{   
    public $verModalCrear = false;
    public $verModalEditar = false;
    public $verModalPassword = false;
    public $verModalEliminar = false;
    public $search = '';
    public $abrirModal = false;

    public $successMessage = null;
    public $errorMessage = null;

    public $roles = [
        "coordinador" => "Coordinador",
        "encuestador" => "Encuestador",
        "visualizador" => "Visualizador",
        "gestor_infraestructura" => "Gestor Infraestructura",
        "gestor_financiero" => "Gestor Financiero",
        "reporte_financiero" => "Reporte Financiero"
    ];

    public CrearUsuario $crearUsuario;

    public EditarUsuario $editarUsuario;

    public ActualizarPassword $actualizarPassword;

    public EliminarUsuario $eliminarUsuario;

    // Metodo para Crear Usuarios
    public function save()
    {
        $this->crearUsuario->save();
        
        if($this->crearUsuario->message == 'success')
        {
            $this->successMessage[] = "Usuario Creado Satisfactoriamente";
        }else
        {
            $this->errorMessage[] = "Ha occurido un error";
        }
    }

    // Metodos para modificar información basica del usuario
    public function edit($id)
    {
        $this->verModalEditar = true;

        $this->editarUsuario->edit($id);

    }

    public function update()
    {
        $this->editarUsuario->update();
        
        if($this->editarUsuario->message == 'success')
        {
            $this->successMessage[] = "Modificación Realizada Satisfactoriamente";
        }else
        {
            $this->errorMessage[] = "Ha occurido un error";
        }
    }

    // Metodos para actualizar contraseña del usuario

    public function editPassword($id)
    {
        $this->verModalPassword = true;
        $this->actualizarPassword->editPassword($id);
    }

    public function updatePassword()
    {
        $this->resetValidation();
        $this->actualizarPassword->updatePassword();

        if($this->actualizarPassword->message == 'success')
        {
            $this->successMessage[] = "Modificación Realizada Satisfactoriamente";
        }else
        {
            $this->errorMessage[] = "Ha occurido un error";
        }

        $this->verModalPassword = false;
    }

    // Metodo para eliminar usuario
    public function delete($id)
    {
        $this->eliminarUsuario->delete($id);
        $this->verModalEliminar = true;
    }
    public function destroy()
    {
        $this->eliminarUsuario->destroy();

        if($this->eliminarUsuario->message == 'success')
        {
            $this->successMessage[] = "Usuario Eliminado Satisfactoriamente";
        }else
        {
            $this->errorMessage[] = "Ha occurido un error";
        }

        $this->verModalEliminar = false;
    }

    public function render()
    {
        $usuarios = User::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.gestion-usuario.index',[
            'usuarios' => $usuarios
        ]);
    }
}
