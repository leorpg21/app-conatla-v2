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

class VerMuestraEncuestador extends Form
{
    
    public $mayerlis_muestra = [];

    public $liseth_muestra = [];

    public $duris_muestra = [];

    public $encuestador;

    public function loadMuestra()
    {
        $this->mayerlis_muestra['rumv'] = 0;
        $this->mayerlis_muestra['educacion'] = 0;
        $this->mayerlis_muestra['salud'] = 0;
        $this->mayerlis_muestra['empleabilidad'] = 0;
        $this->mayerlis_muestra['ruta_productiva'] = 0;
        $this->mayerlis_muestra['atencion_campo'] = 0;
        $this->mayerlis_muestra['formacion_trabajo'] = 0;
        $this->mayerlis_muestra['violencia_genero'] = 0;
        $this->mayerlis_muestra['promocion_prevencion'] = 0;
        $this->mayerlis_muestra['sisben'] = 0;
        $this->mayerlis_muestra['espacio_protector'] = 0;
        $this->mayerlis_muestra['psicosocial'] = 0;

        $this->liseth_muestra['rumv'] = 0;
        $this->liseth_muestra['educacion'] = 0;
        $this->liseth_muestra['salud'] = 0;
        $this->liseth_muestra['empleabilidad'] = 0;
        $this->liseth_muestra['ruta_productiva'] = 0;
        $this->liseth_muestra['atencion_campo'] = 0;
        $this->liseth_muestra['formacion_trabajo'] = 0;
        $this->liseth_muestra['violencia_genero'] = 0;
        $this->liseth_muestra['promocion_prevencion'] = 0;
        $this->liseth_muestra['sisben'] = 0;
        $this->liseth_muestra['espacio_protector'] = 0;
        $this->liseth_muestra['psicosocial'] = 0;


        $this->duris_muestra['rumv'] = 0;
        $this->duris_muestra['educacion'] = 0;
        $this->duris_muestra['salud'] = 0;
        $this->duris_muestra['empleabilidad'] = 0;
        $this->duris_muestra['ruta_productiva'] = 0;
        $this->duris_muestra['atencion_campo'] = 0;
        $this->duris_muestra['formacion_trabajo'] = 0;
        $this->duris_muestra['violencia_genero'] = 0;
        $this->duris_muestra['promocion_prevencion'] = 0;
        $this->duris_muestra['sisben'] = 0;
        $this->duris_muestra['espacio_protector'] = 0;
        $this->duris_muestra['psicosocial'] = 0;

        $formulario_rumv = FormularioRUMV::get()->where('seleccionado_muestra', 'si');
        
        foreach ($formulario_rumv as $rumv) {
            if($rumv->encuestador_id === 3){
                $this->mayerlis_muestra['rumv'] ++;
            }
            if($rumv->encuestador_id === 4){
                $this->liseth_muestra['rumv'] ++;
            } 
            if($rumv->encuestador_id === 5){
                $this->duris_muestra['rumv'] ++;
            } 
        }

        $formulario_educacion = FormularioEducacion::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_educacion as $educacion) {
            if($educacion->encuestador_id === 3){
                $this->mayerlis_muestra['educacion'] ++;
            }
            if($educacion->encuestador_id === 4){
                $this->liseth_muestra['educacion'] ++;
            } 
            if($educacion->encuestador_id === 5){
                $this->duris_muestra['educacion'] ++;
            } 
        }

        $formulario_salud = FormularioSalud::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_salud as $salud) {
            if($salud->encuestador_id === 3){
                $this->mayerlis_muestra['salud'] ++;
            }
            if($salud->encuestador_id === 4){
                $this->liseth_muestra['salud'] ++;
            } 
            if($salud->encuestador_id === 5){
                $this->duris_muestra['salud'] ++;
            } 
        }

        $formulario_empleabilidad = FormularioEmpleabilidad::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_empleabilidad as $empleabilidad) {
            if($empleabilidad->encuestador_id === 3){
                $this->mayerlis_muestra['empleabilidad'] ++;
            }
            if($empleabilidad->encuestador_id === 4){
                $this->liseth_muestra['empleabilidad'] ++;
            } 
            if($empleabilidad->encuestador_id === 5){
                $this->duris_muestra['empleabilidad'] ++;
            } 
        }

        $formulario_ruta_productiva = FormularioRutaProductiva::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_ruta_productiva as $ruta_productiva) {
            if($ruta_productiva->encuestador_id === 3){
                $this->mayerlis_muestra['ruta_productiva'] ++;
            }
            if($ruta_productiva->encuestador_id === 4){
                $this->liseth_muestra['ruta_productiva'] ++;
            } 
            if($ruta_productiva->encuestador_id === 5){
                $this->duris_muestra['ruta_productiva'] ++;
            } 
        }

        $formulario_atencion_campo = FormularioAtencionCampo::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_atencion_campo as $atencion_campo) {
            if($atencion_campo->encuestador_id === 3){
                $this->mayerlis_muestra['atencion_campo'] ++;
            }
            if($atencion_campo->encuestador_id === 4){
                $this->liseth_muestra['atencion_campo'] ++;
            } 
            if($atencion_campo->encuestador_id === 5){
                $this->duris_muestra['atencion_campo'] ++;
            } 
        }

        $formulario_formacion_trabajo = FormularioFormacionTrabajo::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_formacion_trabajo as $formacion_trabajo) {
            if($formacion_trabajo->encuestador_id === 3){
                $this->mayerlis_muestra['formacion_trabajo'] ++;
            }
            if($formacion_trabajo->encuestador_id === 4){
                $this->liseth_muestra['formacion_trabajo'] ++;
            } 
            if($formacion_trabajo->encuestador_id === 5){
                $this->duris_muestra['formacion_trabajo'] ++;
            } 
        }

        $formulario_violencia_genero = FormularioViolenciaGenero::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_violencia_genero as $violencia_genero) {
            if($violencia_genero->encuestador_id === 3){
                $this->mayerlis_muestra['violencia_genero'] ++;
            }
            if($violencia_genero->encuestador_id === 4){
                $this->liseth_muestra['violencia_genero'] ++;
            } 
            if($violencia_genero->encuestador_id === 5){
                $this->duris_muestra['violencia_genero'] ++;
            } 
        }

        $formulario_promocion_prevencion = FormularioPromocionPrevencion::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_promocion_prevencion as $promocion_prevencion) {
            if($promocion_prevencion->encuestador_id === 3){
                $this->mayerlis_muestra['promocion_prevencion'] ++;
            }
            if($promocion_prevencion->encuestador_id === 4){
                $this->liseth_muestra['promocion_prevencion'] ++;
            } 
            if($promocion_prevencion->encuestador_id === 5){
                $this->duris_muestra['promocion_prevencion'] ++;
            } 
        }

        $formulario_espacio_protector = FormularioEspacioProtector::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_espacio_protector as $espacio_protector) {
            if($espacio_protector->encuestador_id === 3){
                $this->mayerlis_muestra['espacio_protector'] ++;
            }
            if($espacio_protector->encuestador_id === 4){
                $this->liseth_muestra['espacio_protector'] ++;
            } 
            if($espacio_protector->encuestador_id === 5){
                $this->duris_muestra['espacio_protector'] ++;
            } 
        }

        $formulario_sisben = FormularioSisben::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_sisben as $sisben) {
            if($sisben->encuestador_id === 3){
                $this->mayerlis_muestra['sisben'] ++;
            }
            if($sisben->encuestador_id === 4){
                $this->liseth_muestra['sisben'] ++;
            } 
            if($sisben->encuestador_id === 5){
                $this->duris_muestra['sisben'] ++;
            } 
        }

        $formulario_espacio_protector = FormularioEspacioProtector::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_espacio_protector as $espacio_protector) {
            if($espacio_protector->encuestador_id === 3){
                $this->mayerlis_muestra['espacio_protector'] ++;
            }
            if($espacio_protector->encuestador_id === 4){
                $this->liseth_muestra['espacio_protector'] ++;
            } 
            if($espacio_protector->encuestador_id === 5){
                $this->duris_muestra['espacio_protector'] ++;
            } 
        }

        $formulario_psicosocial = FormularioPsicosocial::get()->where('seleccionado_muestra', 'si');
        foreach ($formulario_psicosocial as $psicosocial) {
            if($psicosocial->encuestador_id === 3){
                $this->mayerlis_muestra['psicosocial'] ++;
            }
            if($psicosocial->encuestador_id === 4){
                $this->liseth_muestra['psicosocial'] ++;
            } 
            if($psicosocial->encuestador_id === 5){
                $this->duris_muestra['psicosocial'] ++;
            } 
        }

        
    }
}
