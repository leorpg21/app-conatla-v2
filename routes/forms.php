<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Formularios\Rumv\Index as RUMV;
use App\Livewire\Formularios\Rumv\Encuesta as EncuestaRUMV;
use App\Livewire\Formularios\Rumv\VerEncuesta as VerEncuestaRUMV;

use App\Livewire\Formularios\Educacion\Index as Educacion;
use App\Livewire\Formularios\Educacion\Encuesta as EncuestaEducacion;
use App\Livewire\Formularios\Educacion\VerEncuesta as VerEncuestaEducacion;

use App\Livewire\Formularios\Salud\Index as Salud;
use App\Livewire\Formularios\Salud\Encuesta as EncuestaSalud;
use App\Livewire\Formularios\Salud\VerEncuesta as VerEncuestaSalud;

use App\Livewire\Formularios\Empleabilidad\Index as Empleabilidad;
use App\Livewire\Formularios\Empleabilidad\Encuesta as EncuestaEmpleabilidad;
use App\Livewire\Formularios\Empleabilidad\VerEncuesta as VerEncuestaEmpleabilidad;

use App\Livewire\Formularios\RutaProductiva\Index as RutaProductiva;
use App\Livewire\Formularios\RutaProductiva\Encuesta as EncuestaRutaProductiva;
use App\Livewire\Formularios\RutaProductiva\VerEncuesta as VerEncuestaRutaProductiva;

use App\Livewire\Formularios\AtencionCampo\Index as AtencionCampo;
use App\Livewire\Formularios\AtencionCampo\Encuesta as EncuestaAtencionCampo;
use App\Livewire\Formularios\AtencionCampo\VerEncuesta as VerEncuestaAtencionCampo;

use App\Livewire\Formularios\FormacionTrabajo\Index as FormacionTrabajo;
use App\Livewire\Formularios\FormacionTrabajo\Encuesta as EncuestaFormacionTrabajo;
use App\Livewire\Formularios\FormacionTrabajo\VerEncuesta as VerEncuestaFormacionTrabajo;

use App\Livewire\Formularios\ViolenciaGenero\Index as ViolenciaGenero;
use App\Livewire\Formularios\ViolenciaGenero\Encuesta as EncuestaViolenciaGenero;
use App\Livewire\Formularios\ViolenciaGenero\VerEncuesta as VerEncuestaViolenciaGenero;

use App\Livewire\Formularios\PromocionPrevencion\Index as PromocionPrevencion;
use App\Livewire\Formularios\PromocionPrevencion\Encuesta as EncuestaPromocionPrevencion;
use App\Livewire\Formularios\PromocionPrevencion\VerEncuesta as VerEncuestaPromocionPrevencion;

use App\Livewire\Formularios\Sisben\Index as Sisben;
use App\Livewire\Formularios\Sisben\Encuesta as EncuestaSisben;
use App\Livewire\Formularios\Sisben\VerEncuesta as VerEncuestaSisben;

use App\Livewire\Formularios\EspacioProtector\Index as EspacioProtector;
use App\Livewire\Formularios\EspacioProtector\Encuesta as EncuestaEspacioProtector;
use App\Livewire\Formularios\EspacioProtector\VerEncuesta as VerEncuestaEspacioProtector;

use App\Livewire\Formularios\Psicosocial\Index as Psicosocial;
use App\Livewire\Formularios\Psicosocial\Encuesta as EncuestaPsicosocial;
use App\Livewire\Formularios\Psicosocial\VerEncuesta as VerEncuestaPsicosocial;

Route::middleware(['auth'])->group(function(){

    // Ruta Formulario RUMV #1
    Route::get('formulario-rumv', RUMV::class)
        ->middleware(['permission:ver_formulario_rumv|editar_formulario_rumv'])
        ->name('rumv.index');

    Route::get('formulario-rumv/{id}/encuesta', EncuestaRUMV::class)
        ->middleware(['permission:ver_formulario_rumv|editar_formulario_rumv'])
        ->name('rumv.encuesta');

    Route::get('formulario-rumv/{id}/ver-encuesta', VerEncuestaRUMV::class)
        ->middleware(['permission:ver_formulario_rumv|editar_formulario_rumv'])
        ->name('rumv.ver-encuesta');

    // Ruta Formulario Educacion #2
    Route::get('formulario-educacion', Educacion::class)
        ->middleware(['permission:ver_formulario_educacion|editar_formulario_educacion'])
        ->name('educacion.index');

    Route::get('formulario-educacion/{id}/encuesta', EncuestaEducacion::class)
        ->middleware(['permission:ver_formulario_educacion|editar_formulario_educacion'])
        ->name('educacion.encuesta');

    Route::get('formulario-educacion/{id}/ver-encuesta', VerEncuestaEducacion::class)
        ->middleware(['permission:ver_formulario_educacion|editar_formulario_educacion'])
        ->name('educacion.ver-encuesta');

    // Ruta Formulario Salud #3
    Route::get('formulario-salud', Salud::class)
        ->middleware(['permission:ver_formulario_salud|editar_formulario_salud'])
        ->name('salud.index');

    Route::get('formulario-salud/{id}/encuesta', EncuestaSalud::class)
        ->middleware(['permission:ver_formulario_salud|editar_formulario_salud'])
        ->name('salud.encuesta');
    
    Route::get('formulario-salud/{id}/ver-encuesta', VerEncuestaSalud::class)
        ->middleware(['permission:ver_formulario_salud|editar_formulario_salud'])
        ->name('salud.ver-encuesta');

    // Ruta Formulario Empleabilidad #4
    Route::get('formulario-empleabilidad', Empleabilidad::class)
        ->middleware(['permission:ver_formulario_empleabilidad|editar_formulario_empleabilidad'])
        ->name('empleabilidad.index');

    Route::get('formulario-empleabilidad/{id}/encuesta', EncuestaEmpleabilidad::class)
        ->middleware(['permission:ver_formulario_empleabilidad|editar_formulario_empleabilidad'])
        ->name('empleabilidad.encuesta');

    Route::get('formulario-empleabilidad/{id}/ver-encuesta', VerEncuestaEmpleabilidad::class)
        ->middleware(['permission:ver_formulario_empleabilidad|editar_formulario_empleabilidad'])
        ->name('empleabilidad.ver-encuesta');

    // Ruta Formulario Ruta Productiva #5
    Route::get('formulario-ruta-productiva', RutaProductiva::class)
        ->middleware(['permission:ver_formulario_ruta_productiva|editar_formulario_ruta_productiva'])
        ->name('ruta_productiva.index');

    Route::get('formulario-ruta-productiva/{id}/encuesta', EncuestaRutaProductiva::class)
        ->middleware(['permission:ver_formulario_ruta_productiva|editar_formulario_ruta_productiva'])
        ->name('ruta_productiva.encuesta');
    
    Route::get('formulario-ruta-productiva/{id}/ver-encuesta', VerEncuestaRutaProductiva::class)
        ->middleware(['permission:ver_formulario_ruta_productiva|editar_formulario_ruta_productiva'])
        ->name('ruta_productiva.ver-encuesta');

    // Ruta Formulario Atencion en el campo #6
    Route::get('formulario-atencion-campo', AtencionCampo::class)
        ->middleware(['permission:ver_formulario_atencion_campo|editar_formulario_atencion_campo'])
        ->name('atencion_campo.index');
    
    Route::get('formulario-atencion-campo/{id}/encuesta', EncuestaAtencionCampo::class)
        ->middleware(['permission:ver_formulario_atencion_campo|editar_formulario_atencion_campo'])
        ->name('atencion_campo.encuesta');

    Route::get('formulario-atencion-campo/{id}/ver-encuesta', VerEncuestaAtencionCampo::class)
        ->middleware(['permission:ver_formulario_atencion_campo|editar_formulario_atencion_campo'])
        ->name('atencion_campo.ver-encuesta');

    // Ruta Formulario Formacion en trabajo #7
    Route::get('formulario-formacion-trabajo', FormacionTrabajo::class)
        ->middleware(['permission:ver_formulario_formacion_trabajo|editar_formulario_formacion_trabajo'])
        ->name('formacion_trabajo.index');
    
    Route::get('formulario-formacion-trabajo/{id}/encuesta', EncuestaFormacionTrabajo::class)
        ->middleware(['permission:ver_formulario_formacion_trabajo|editar_formulario_formacion_trabajo'])
        ->name('formacion_trabajo.encuesta');

    Route::get('formulario-formacion-trabajo/{id}/ver-encuesta', VerEncuestaFormacionTrabajo::class)
        ->middleware(['permission:ver_formulario_formacion_trabajo|editar_formulario_formacion_trabajo'])
        ->name('formacion_trabajo.ver-encuesta');

    // Ruta Formulario Violencia Genero #8
    Route::get('formulario-violencia-genero', ViolenciaGenero::class)
        ->middleware(['permission:ver_formulario_violencia_genero|editar_formulario_violencia_genero'])
        ->name('violencia_genero.index');

    Route::get('formulario-violencia-genero/{id}/encuesta', EncuestaViolenciaGenero::class)
        ->middleware(['permission:ver_formulario_violencia_genero|editar_formulario_violencia_genero'])
        ->name('violencia_genero.encuesta');

    Route::get('formulario-violencia-genero/{id}/ver-encuesta', VerEncuestaViolenciaGenero::class)
        ->middleware(['permission:ver_formulario_violencia_genero|editar_formulario_violencia_genero'])
        ->name('violencia_genero.ver-encuesta');

    // Ruta Formulario Promoción y Prevensión #9
    Route::get('formulario-promocion-prevencion', PromocionPrevencion::class)
        ->middleware(['permission:ver_formulario_promocion_prevencion|editar_formulario_promocion_prevencion'])
        ->name('promocion_prevencion.index');

    Route::get('formulario-promocion-prevencion/{id}/encuesta', EncuestaPromocionPrevencion::class)
        ->middleware(['permission:ver_formulario_promocion_prevencion|editar_formulario_promocion_prevencion'])
        ->name('promocion_prevencion.encuesta');

    Route::get('formulario-promocion-prevencion/{id}/ver-encuesta', VerEncuestaPromocionPrevencion::class)
        ->middleware(['permission:ver_formulario_promocion_prevencion|editar_formulario_promocion_prevencion'])
        ->name('promocion_prevencion.ver-encuesta');

    // Ruta Fomrulario Sisben #10
    Route::get('formulario-sisben', Sisben::class)
        ->middleware(['permission:ver_formulario_sisben|editar_formulario_sisben'])
        ->name('sisben.index');
    
    Route::get('formulario-sisben/{id}/encuesta', EncuestaSisben::class)
        ->middleware(['permission:ver_formulario_sisben|editar_formulario_sisben'])
        ->name('sisben.encuesta');

    Route::get('formulario-sisben/{id}/ver-encuesta', VerEncuestaSisben::class)
        ->middleware(['permission:ver_formulario_sisben|editar_formulario_sisben'])
        ->name('sisben.ver-encuesta');

    // Ruta Formulario Espacio Protector #11
    Route::get('formulario-espacio-protector', EspacioProtector::class)
        ->middleware(['permission:ver_formulario_espacio_protector|editar_formulario_espacio_protector'])
        ->name('espacio_protector.index');

    Route::get('formulario-espacio-protector/{id}/encuesta', EncuestaEspacioProtector::class)
        ->middleware(['permission:ver_formulario_espacio_protector|editar_formulario_espacio_protector'])
        ->name('espacio_protector.encuesta');

    Route::get('formulario-espacio-protector/{id}/ver-encuesta', VerEncuestaEspacioProtector::class)
        ->middleware(['permission:ver_formulario_espacio_protector|editar_formulario_espacio_protector'])
        ->name('espacio_protector.ver-encuesta');

    // Ruta Formulario Psicosocial #12
    Route::get('formulario-psicosocial', Psicosocial::class)
        ->middleware(['permission:ver_formulario_psicosocial|editar_formulario_psicosocial'])
        ->name('psicosocial.index');

    Route::get('formulario-psicosocial/{id}/encuesta', EncuestaPsicosocial::class)
        ->middleware(['permission:ver_formulario_psicosocial|editar_formulario_psicosocial'])
        ->name('psicosocial.encuesta');

    Route::get('formulario-psicosocial/{id}/ver-encuesta', VerEncuestaPsicosocial::class)
        ->middleware(['permission:ver_formulario_psicosocial|editar_formulario_psicosocial'])
        ->name('psicosocial.ver-encuesta');


});