<?php

namespace App\Livewire\Forms\SFI\IndicadorSeis;

use App\Models\SFIndicadorSeis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditarIndicador extends Form
{
    #[Validate(['verificado.*' => 'nullable|string|in:si,no'])]
    public $verificado = [];

    #[Validate(['observacion.*' => 'nullable|string|min:3|max:400'])]
    public $observacion = [];

    public $message = '';

    public function loadIndicador()
    {
        // Cargamos la información para que se pueda ver en la tabla
        $indicador = SFIndicadorSeis::all();

        foreach ($indicador as $value) {
            $this->verificado[$value->id] = $value->verificado;
            $this->observacion[$value->id] = $value->observacion;
        }

    }
    public function update()
    {
        $this->validate();
        try {
            //Mediante este foreach actualizamos todos los verifcidaos enviados mediante el formulario
            foreach ($this->verificado as $key => $value) 
            {
                $actualizar_verificado = SFIndicadorSeis::find($key);
                if($actualizar_verificado)
                {
                    $actualizar_verificado->update([
                        'verificado' => $value,
                        'updated_at'  => now()
                    ]);
                    $actualizar_verificado->save();
                }
            }

            //Mediante este foreach actualizamos todos las observaciones enviados mediante el formulario
            foreach ($this->observacion as $key => $value) 
            {
                $actualizar_observacion = SFIndicadorSeis::find($key);
                if($actualizar_observacion)
                {
                    $actualizar_observacion->update([
                        'observacion' => $value,
                        'updated_at'  => now()
                    ]);
                    $actualizar_observacion->save();
                }
            }
            $this->message = 'success';
            
        } catch (\Throwable $e) {
            $this->message = 'error';
        }
    }
}
