<?php

namespace App\Livewire\Forms\GestionarUsuario;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EliminarUsuario extends Form
{
    public $id;
    public $message = "";
    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        $usuario = User::find($this->id);

        if($usuario)
        {
            $usuario->delete();
            $this->message = "success";
        }else{
            $this->message = "error";
        }
        
    }
}
