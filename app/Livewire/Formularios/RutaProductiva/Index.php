<?php

namespace App\Livewire\Formularios\RutaProductiva;

use App\Livewire\Forms\Formularios\RutaProductiva\AgregarObservacion;
use App\Models\Beneficiario;
use App\Models\FormularioRutaProductiva;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $errorMessage = null;
    public $successMessage = null;
    
    public $per_page = 20;
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = 'circle';
    public $verModalAgregarObservacion = false;
    public $modalVerObservacion = false;

    public $route_encuesta = "ruta_productiva.encuesta";
    public $route_ver_encuesta = "ruta_productiva.ver-encuesta";
    public $beneficiarios_cards;
    public $gestionado = 0;
    public $encuestado = 0;
    public $sin_revisar = 0;
    public $muestra = 0;
    public $estrato = 0;

    public AgregarObservacion $agregar_observacion;
    
    #[On(['update-observacion'])]
    public function mount()
    {
        $this->beneficiarios_cards = FormularioRutaProductiva::get()->where('seleccionado_muestra', 'si');
        $this->gestionado = 0;
        $this->encuestado = 0;
        $this->sin_revisar = 0;
        $this->muestra = 0;
        $this->estrato = 0;
        foreach ($this->beneficiarios_cards  as $value) 
        {
            if($value->estado == 'gestionado') $this->gestionado ++;
            if($value->estado == 'encuestado') $this->encuestado ++;
            if($value->estado == 'sin revisar') $this->sin_revisar ++;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->resetPage();
        $this->search = '';
        $this->order = null;
        $this->icon = 'circle';
        $this->verModalAgregarObservacion = false;
        $this->per_page = 20;
    }
    
    // Metodo para filtrar por campos
    public function sortable($campo)
    {
        if($campo !== $this->campo) $this->order = null;
        
        switch ($this->order) {
            case null:
                $this->order = 'asc';
                $this->icon = 'circle-arrow-up';
                break;

            case 'asc':
                $this->order = 'desc';
                $this->icon = 'circle-arrow-down';
                break;
            
            case 'desc':
                $this->order = 'asc';
                $this->icon = 'circle-arrow-up';
                break;
        }

        $this->campo = $campo;
    }

    // Metodos para agregar observacion
    public function agregarObservacion($id)
    {
        $this->verModalAgregarObservacion = true;
        $this->agregar_observacion->edit($id);
    }

    public function updateObservacion()
    {
        $this->agregar_observacion->update();

        if($this->agregar_observacion->message == 'success')
        {
            $this->successMessage[] = 'Se ha agregado observación';
        }else
        {
            $this->errorMessage[] = 'Ha ocurrido un error';
        }

        $this->verModalAgregarObservacion = false;

        $this->dispatch('update-observacion');
    }

    // Metodo para ver Observación

    
    public function render()
    {
        $user = Auth::user();

        $beneficiarios = FormularioRutaProductiva::with('beneficiario')
            ->where('seleccionado_muestra', 'si')
            ->where(function ($query) {
                $query->whereHas('beneficiario', function($search){
                    $search->where('nombre', 'like', '%'.$this->search.'%')
                        ->orWhere('correo', 'like', '%'.$this->search.'%')
                        ->orWhere('numero_telefono', 'like', '%'.$this->search.'%')
                        ->orWhere('tipo_servicio_prestado', 'like', '%'.$this->search.'%');
                })
                ->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('estado', 'like', '%'.$this->search.'%');
            });
        
        if($user->getRoleNames()->first() == 'encuestador')
        {
            $beneficiarios->where('encuestador_id', $user->id);
        }
        
        if($this->campo && $this->order)
        {
            $beneficiarios = $beneficiarios->orderBy(Beneficiario::select($this->campo)
                ->whereColumn('beneficiarios.id', 'formulario_ruta_productiva.beneficiario_id'), $this->order

            );
        }
        
        $beneficiarios = $beneficiarios->paginate($this->per_page);
        
        return view('livewire.formularios.ruta-productiva.index', [
            'beneficiarios' => $beneficiarios
        ]);
    } 
}
