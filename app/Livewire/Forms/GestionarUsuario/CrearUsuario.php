<?php

namespace App\Livewire\Forms\GestionarUsuario;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CrearUsuario extends Form
{
    #[Validate('required|min:3|max:30')]
    public $nombre = '';

    #[Validate('required|string|min:3|max:20|regex:/^[a-zA-Z0-9_]+$/|unique:users,username')]
    public $username = '';

    #[Validate('required|string')]
    public $password = '';

    #[Validate('required|string|in:coordinador,encuestador,visualizador,gestor_infraestructura,gestor_financiero,reporte_financiero')]
    public $rol = '';

    public $message = "";

    public function save(){
        $this->validate();

        User::create([
            'name'     => $this->nombre,
            'username' => $this->username,
            'password' => $this->password
        ])->syncRoles($this->rol);

        $this->reset();

        $this->message = "success";

    }

}
