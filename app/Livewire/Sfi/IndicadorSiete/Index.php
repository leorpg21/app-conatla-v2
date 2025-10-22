<?php

namespace App\Livewire\Sfi\IndicadorSiete;

use App\Livewire\Forms\SFI\IndicadorSiete\EditarIndicador;
use App\Livewire\Forms\SFI\IndicadorSiete\CargarInformacion;
use App\Models\SFIndicadorSiete;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    
    public $soporte_finaciero;
    public CargarInformacion $cargar_informacion;
    public EditarIndicador $editar_indicador;

    public $successMessage = null;
    public $errorMessage = null;

    public $modalCargarDocumento = false;
    
    public $cabecera_tabla = 'Indicador 7: Número de personas que son atendidas por iniciativas de la oferta del Distrito, a población migrante y sus comunidades de acogida (programas sociales y de inclusión laboral, cultural y de protección)';
    
    public $proyectado = 2150000;
    public $total_egreso = 0;
    public $total_usd = 0;
    public $porcentaje_proyectado = 0;

    #[On(['cargar-informacion', 'editar-indicador'])]
    public function mount()
    {
        $this->soporte_finaciero = SFIndicadorSiete::all();
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
        return view('livewire.sfi.indicador-siete.index');
    }
}
