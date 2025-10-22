<?php

namespace App\Livewire\Forms\GestionarUsuario;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ActualizarPassword extends Form
{
    public $id;

    #[Validate('required|confirmed|string|min:3|max:15')]
    public $password = '';

    #[Validate('required')]
    public $password_confirmation = '';

    public $message = "";

    public function editPassword($id)
    {
        $this->id = $id;
    }

    public function updatePassword()
    {

        $this->validate();

        $usuario = User::find($this->id);

        if($usuario)
        {
            $usuario->password = $this->password;
            $usuario->save();
            $this->reset();
            $this->message = "success";
        }else{
            $this->message = "error";
        }

    }
}
