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

class AgregarEncuestador extends Form
{
    public $encuestador = [];

    public $message = '';

    public function loadEncuestador($formulario)
    {
        if($formulario == 'rumv')
        {
            $formulario_encuestador = FormularioRUMV::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'educacion')
        {
            $formulario_encuestador = FormularioEducacion::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }
            
        }elseif($formulario == 'salud')
        {
            $formulario_encuestador = FormularioSalud::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'empleabilidad')
        {
            $formulario_encuestador = FormularioEmpleabilidad::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'ruta_productiva')
        {
            $formulario_encuestador = FormularioRutaProductiva::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'atencion_campo')
        {
            $formulario_encuestador = FormularioAtencionCampo::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'formacion_trabajo')
        {
            $formulario_encuestador = FormularioFormacionTrabajo::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'violencia_genero')
        {
            $formulario_encuestador = FormularioViolenciaGenero::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'promocion_prevencion')
        {
            $formulario_encuestador = FormularioPromocionPrevencion::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'sisben')
        {
            $formulario_encuestador = FormularioSisben::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }

        }elseif($formulario == 'espacio_protector')
        {
            $formulario_encuestador = FormularioEspacioProtector::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }
        }elseif($formulario == 'psicosocial')
        {
            $formulario_encuestador = FormularioPsicosocial::get();
            foreach ($formulario_encuestador as $fe) {
                $this->encuestador[$fe->id] = $fe->encuestador_id;
            }
        }else {
            $this->message = 'error';
        }
        
    }

    public function update($idFormulario, $formulario)
    {
        if($formulario == 'rumv')
        {
            try {
                $formulario = FormularioRUMV::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }  

        }elseif($formulario == 'educacion')
        {
            try {
                $formulario = FormularioEducacion::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }
            
        }elseif($formulario == 'salud')
        {
            try {
                $formulario = FormularioSalud::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'empleabilidad')
        {
            try {
                $formulario = FormularioEmpleabilidad::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'ruta_productiva')
        {
            try {
                $formulario = FormularioRutaProductiva::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'atencion_campo')
        {
            try {
                $formulario = FormularioAtencionCampo::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'formacion_trabajo')
        {
            try {
                $formulario = FormularioFormacionTrabajo::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'violencia_genero')
        {
            try {
                $formulario = FormularioViolenciaGenero::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'promocion_prevencion')
        {
            try {
                $formulario = FormularioPromocionPrevencion::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'sisben')
        {
            try {
                $formulario = FormularioSisben::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }elseif($formulario == 'espacio_protector')
        {
            try {
                $formulario = FormularioEspacioProtector::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }
        }elseif($formulario == 'psicosocial')
        {
            try {
                $formulario = FormularioPsicosocial::find($idFormulario);
                $formulario->encuestador_id = $this->encuestador[$idFormulario];
                $formulario->save();

                $this->message = 'success';
            } catch (\Throwable $err) {
                $this->message = 'error';
            }

        }else {
            $this->message = 'error';
        }
    }
}
