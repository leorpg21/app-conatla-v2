<?php

namespace App\Livewire\Forms\Muestra;

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
use Livewire\Attributes\Validate;
use Livewire\Form;

class EliminarMuestra extends Form
{
    public $message = '';

    public function quitar($formulario, $id)
    {
        if($formulario == 'rumv')
        {
            $formulario = FormularioRUMV::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'educacion')
        {
            $formulario = FormularioEducacion::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'salud')
        {
            $formulario = FormularioSalud::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'empleabilidad')
        {
            $formulario = FormularioEmpleabilidad::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'ruta_productiva')
        {
            $formulario = FormularioRutaProductiva::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'atencion_campo')
        {
            $formulario = FormularioAtencionCampo::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'formacion_trabajo')
        {
            $formulario = FormularioFormacionTrabajo::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'violencia_genero')
        {
            $formulario = FormularioViolenciaGenero::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'promocion_prevencion')
        {
            $formulario = FormularioPromocionPrevencion::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'sisben')
        {
            $formulario = FormularioSisben::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'espacio_protector')
        {
            $formulario = FormularioEspacioProtector::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }elseif($formulario == 'psicosocial')
        {
            $formulario = FormularioPsicosocial::find($id);

            if($formulario)
            {
                $formulario->seleccionado_muestra = 'no';
                $formulario->save();
                $this->message = 'success';
            }else
            {
                $this->message = 'error';
            }

        }else {
            $this->message = 'error';
        }
        
    }
}
