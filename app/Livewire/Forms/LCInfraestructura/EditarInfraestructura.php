<?php

namespace App\Livewire\Forms\LCInfraestructura;

use App\Models\LCInfraestructura;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditarInfraestructura extends Form
{

    #[Validate(['cantidad_verificada.*' => 'nullable|integer'])]
    public $cantidad_verificada = [];

    #[Validate(['estado.*' => 'nullable|string|in:bueno,malo,regular,no aplica'])]
    public $estado = [];

    #[Validate(['observacion.*' => 'nullable|string|min:3|max:400'])]
    public $observacion = [];

    public $message = '';

    public function loadInfraestructura()
    {
        // Cargamos la información para que se pueda ver en la tabla
        $indicador = LCInfraestructura::all();

        foreach ($indicador as $value) {
            $this->cantidad_verificada[$value->id] = $value->cantidad_verificada;
            $this->estado[$value->id] = $value->estado;
            $this->observacion[$value->id] = $value->observacion;
        }

    }

    public function update()
    {
        $this->validate();
        try {
            //Mediante este foreach actualizamos todos la cantidad verificada enviada mediante el formulario
            foreach ($this->cantidad_verificada as $key => $value) 
            {
                $actualizar_verificado = LCInfraestructura::find($key);
                if($actualizar_verificado)
                {
                    $actualizar_verificado->update([
                        'cantidad_verificada' => $value,
                        'updated_at'  => now()
                    ]);
                    $actualizar_verificado->save();
                }
            }

            //Mediante este foreach actualizamos todos el estado enviado mediante el formulario
            foreach ($this->estado as $key => $value) 
            {
                $actualizar_estado = LCInfraestructura::find($key);
                if($actualizar_estado)
                {
                    $actualizar_estado->update([
                        'estado' => $value,
                        'updated_at'  => now()
                    ]);
                    $actualizar_estado->save();
                }
            }

            //Mediante este foreach actualizamos todos las observaciones enviados mediante el formulario
            foreach ($this->observacion as $key => $value) 
            {
                $actualizar_observacion = LCInfraestructura::find($key);
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
