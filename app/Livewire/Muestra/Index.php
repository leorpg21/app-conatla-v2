<?php

namespace App\Livewire\Muestra;

use App\Livewire\Forms\Muestra\AgregarEncuestador;
use App\Livewire\Forms\Muestra\EliminarMuestra;
use App\Livewire\Forms\Muestra\SubirMuestra;
use App\Livewire\Forms\Muestra\VerMuestraEncuestador;
use App\Models\Beneficiario;
use App\Models\FormularioAtencionCampo;
use App\Models\FormularioEducacion;
use App\Models\FormularioEmpleabilidad;
use App\Models\FormularioEspacioProtector;
use App\Models\FormularioFormacionTrabajo;
use App\Models\FormularioPromocionPrevencion;
use App\Models\FormularioPsicosocial;
use App\Models\FormularioRUMV;
use App\Models\FormularioRutaProductiva;
use App\Models\FormularioSalud;
use App\Models\FormularioSisben;
use App\Models\FormularioViolenciaGenero;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $per_page = 20;
    public $campo = null;
    public $order = null;
    public $icon = 'circle';
    public $selectedFormulario = 'rumv';
    public $successMessage = null;
    public $errorMessage = null;

    public SubirMuestra $subir_muestra;
    public EliminarMuestra $eliminar_muestra;
    public VerMuestraEncuestador $ver_muestra_encuestador;
    public AgregarEncuestador $agregar_encuestador;

    public $muestra_rumv;

    // Cargamos los datos de los gestores

    

    #[On('update-muestra')]
    public function mount()
    {
        $this->ver_muestra_encuestador->loadMuestra();
        $this->agregar_encuestador->loadEncuestador($this->selectedFormulario);
    }

    // Forzar la paginación a la página 1 al buscar o cambiar de formulario
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedFormulario()
    {
        $this->resetPage();
    }

    // Metodo para borarr filtros
    public function clear()
    {
        $this->resetPage();
        $this->search = '';
        $this->order = null;
        $this->icon = 'circle';
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

    public function updateEncuestador($idFormulario)
    {
        $this->agregar_encuestador->update($idFormulario, $this->selectedFormulario);
        
        if($this->agregar_encuestador->message == 'success')
        {
            $this->successMessage[] = 'Se realizado los cambios correctamente!';
        }else
        {
            $this->errorMessage[] = 'Ha ocurrido un error!';
        }
        $this->dispatch('update-muestra');
    }
    public function subirMuestra($id)
    {
        $this->subir_muestra->subir($this->selectedFormulario, $id);

        if($this->subir_muestra->message == 'success')
        {
            $this->successMessage[] = 'Se realizado los cambios correctamente!';
        }else
        {
            $this->errorMessage[] = 'Ha ocurrido un error!';
        }
       
        $this->dispatch('update-muestra');
    }


    public function quitarMuestra($id)
    {
        $this->eliminar_muestra->quitar($this->selectedFormulario, $id);

        if($this->eliminar_muestra->message == 'success')
        {
            $this->successMessage[] = 'Se realizado los cambios correctamente!';
        }else
        {
            $this->errorMessage[] = 'Ha ocurrido un error!';
        }

        $this->dispatch('update-muestra');
    }

    public function render()
    {
        $formularios = collect(); // valor por defecto

        switch ($this->selectedFormulario) {
            case 'rumv':
                $formularios = FormularioRUMV::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                    if($this->campo && $this->order)
                    {
                        $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                            ->whereColumn('beneficiarios.id', 'formulario_rumv.beneficiario_id'), $this->order

                        );
                    }
                    $formularios = $formularios->paginate($this->per_page);
                break;
            case 'educacion':
                $formularios = FormularioEducacion::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_educacion.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'salud':
                $formularios = FormularioSalud::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_salud.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'empleabilidad':
                $formularios = FormularioEmpleabilidad::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_empleabilidad.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'ruta_productiva':
                $formularios = FormularioRutaProductiva::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_ruta_productiva.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'atencion_campo':
                $formularios = FormularioAtencionCampo::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_atencion_campo.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'formacion_trabajo':
                $formularios = FormularioFormacionTrabajo::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_formacion_trabajo.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'violencia_genero':
                $formularios = FormularioViolenciaGenero::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_violencia_genero.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'promocion_prevencion':
                $formularios = FormularioPromocionPrevencion::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_promocion_prevencion.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'sisben':
                $formularios = FormularioSisben::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_sisben.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'espacio_protector':
                $formularios = FormularioEspacioProtector::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_espacio_protector.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;

            case 'psicosocial':
                $formularios = FormularioPsicosocial::with('beneficiario')
                    ->whereHas('beneficiario', function ($query) {
                        $query->where('nombre', 'like', '%'.$this->search.'%')
                            ->orWhere('correo', 'like', '%'.$this->search.'%')
                            ->orWhere('numero_telefono', 'like', '%'.$this->search.'%');
                    })
                    ->orWhere('id', 'like', '%'.$this->search.'%')
                    ->orWhere('estado', 'like', '%'.$this->search.'%');
                if($this->campo && $this->order)
                {
                    $formularios = $formularios->orderBy(Beneficiario::select($this->campo)
                        ->whereColumn('beneficiarios.id', 'formulario_psicosocial.beneficiario_id'), $this->order

                    );
                }
                $formularios = $formularios->paginate($this->per_page);
                break;
            
        }

        return view('livewire.muestra.index', [
            'formularios' => $formularios,
        ]);
    }

    
   
    
}
