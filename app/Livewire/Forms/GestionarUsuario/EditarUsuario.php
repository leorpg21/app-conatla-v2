<?php

namespace App\Livewire\Forms\GestionarUsuario;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditarUsuario extends Form
{
    public $id;

    public $nombre = '';

    public $username = '';

    public $rol = '';

    public $message = "";

    protected function rules()
    {
        return [
            'nombre' => 'required|min:3|max:30',
            'username' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z0-9_]+$/',
                Rule::unique('users', 'username')->ignore($this->id),
            ],
            'rol' => 'required|string|in:coordinador,encuestador,visualizador,gestor_infraestructura,gestor_financiero,reporte_financiero',
        ];
    }

    public function edit($id)
    {
        $this->id = $id;
        $usuario = User::find($id);
        $this->nombre = $usuario->name;
        $this->username = $usuario->username;
        $this->rol = $usuario->getRoleNames()->first();
    }

    public function update()
    {
        $this->validate();

        $usuario = User::find($this->id);
        if($usuario)
        {
            $usuario->name = $this->nombre;
            $usuario->username = $this->username;
            $usuario->syncRoles($this->rol);
    
            $usuario->save();
    
            $this->message = "sucess";
        }else
        {
            $this->message = "error";
        }
    }
}
