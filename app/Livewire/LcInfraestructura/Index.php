<?php

namespace App\Livewire\LcInfraestructura;

use App\Livewire\Forms\LCInfraestructura\EditarInfraestructura;
use App\Models\LCInfraestructura;
use Livewire\Component;
use PhpParser\Node\Expr\NullsafeMethodCall;

class Index extends Component
{
    public $lc_infraestructura;
    
    public $successMessage = null;
    public $errorMessage = null;

    public EditarInfraestructura $editar_infraestructura;

    public function mount()
    {
        $this->lc_infraestructura = LCInfraestructura::all();
        $this->editar_infraestructura->loadInfraestructura();
    }


    public function editarInfraestructura()
    {
        $this->editar_infraestructura->update();
        $this->lc_infraestructura = LCInfraestructura::all();
   
        $this->editar_infraestructura->loadInfraestructura();

        if($this->editar_infraestructura->message == 'success')
        {
            $this->successMessage[] = 'Se han actualizado los registros correctamente';

        }else
        {
            $this->errorMessage[] = 'Error al actualizar información';
        }
    }

    public function render()
    {
        return view('livewire.lc-infraestructura.index');
    }
}
