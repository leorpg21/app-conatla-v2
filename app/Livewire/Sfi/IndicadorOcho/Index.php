<?php

namespace App\Livewire\Sfi\IndicadorOcho;

use App\Livewire\Forms\SFI\IndicadorOcho\CargarInformacion;
use App\Livewire\Forms\SFI\IndicadorOcho\EditarIndicador;
use App\Models\SFIndicadorOcho;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    
    public $soporte_finaciero;
    public CargarInformacion $cargar_informacion;
    public EditarIndicador $editar_indicador;

    public $cabecera_tabla = 'Indicador 8: Número de mujeres migrantes y de población de acogida atendidas bajo los servicios ofertados por la Oficina de la Mujer';

    public $modalCargarDocumento = false;

    public $successMessage = null;
    public $errorMessage = null;

    public $proyectado = 330000;
    public $total_egreso = 0;
    public $total_usd = 0;
    public $porcentaje_proyectado = 0;
    
    #[On(['cargar-informacion', 'editar-indicador'])]
    public function mount()
    {
        $this->soporte_finaciero = SFIndicadorOcho::all();
        $this->editar_indicador->loadIndicador();

        foreach ($this->soporte_finaciero as $sf) {
            $this->total_egreso += $sf->valor_egreso;
            $this->total_usd += $sf->usd;
        }

        $this->porcentaje_proyectado = round($this->total_usd / $this->proyectado * 100);
    }
    
    public function cargarInformacion()
    {
        $this->cargar_informacion->importar();

        if($this->cargar_informacion->message == 'success')
        {
            $this->successMessage[] = 'Importación completada correctamente.';

        }else
        {
            $this->errorMessage[] = 'Error durante la importación';
        }

        $this->dispatch('cargar-informacion');

        $this->modalCargarDocumento = false;
    }

    public function editarIndicador()
    {
        $this->editar_indicador->update();
        $this->editar_indicador->loadIndicador();

        if($this->editar_indicador->message == 'success')
        {
            $this->successMessage[] = 'Se han actualizado los registros correctamente';

        }else
        {
            $this->errorMessage[] = 'Error al actualizar información';
        }

        $this->dispatch('editar-indicador');
    }

    public function render()
    {
        return view('livewire.sfi.indicador-ocho.index');
    }
}
