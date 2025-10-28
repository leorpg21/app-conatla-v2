<?php

namespace App\Livewire\Auth;

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
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string')]
    public string $username = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        $user = Auth::user();
        // Si el usuario es un encuestador vamos a crear una session para almacenar los formularios
        if ($user->getRoleNames()->first() == 'encuestador')
        {
            $formularios = [];

            // Almacenamos si tiene asignado formulario RUMV 1
            $rumv = FormularioRUMV::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($rumv)
            {
                $formularios[] = "rumv";
            }

            // Educación 2
            $educacion = FormularioEducacion::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($educacion)
            {
                $formularios[] = "educacion";
            }

            // Almacenamos si tiene asignado forulario de salud 3
            $salud = FormularioSalud::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($salud)
            {
                $formularios[] = "salud";
            }

            // ..... Empleabilidad 4

            $empleabilidad = FormularioEmpleabilidad::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($empleabilidad)
            {
                $formularios[] = "empleabilidad";
            }

            // .... Ruta Productiva 5
            $ruta_productiva = FormularioRutaProductiva::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($ruta_productiva)
            {
                $formularios[] = "ruta_productiva";
            }

            // .... Atencion en campo 6
            $atencion_campo = FormularioAtencionCampo::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($atencion_campo)
            {
                $formularios[] = "atencion_campo";
            }

            // ... Formación para el trabajo 7

            $formacion_trabajo = FormularioFormacionTrabajo::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($formacion_trabajo)
            {
                $formularios[] = "formacion_trabajo";
            }

            // ... violencia de genero 8

            $violencia_genero = FormularioViolenciaGenero::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($violencia_genero)
            {
                $formularios[] = "violencia_genero";
            }

            // .... Promoción y Prevención 9

            $promocion_prevencion = FormularioPromocionPrevencion::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($promocion_prevencion)
            {
                $formularios[] = "promocion_prevencion";
            }

            // .... SISBEN 10
            $sisben = FormularioSisben::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($sisben)
            {
                $formularios[] = "sisben";
            }

            // ... Espacio protector 11

            $espacio_protector = FormularioEspacioProtector::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($espacio_protector)
            {
                $formularios[] = "espacio_protector";
            }

            // ... Psicosocial 12
            $psicosocial = FormularioPsicosocial::where('encuestador_id', $user->id)->where('seleccionado_muestra', 'si')->exists();

            if($psicosocial)
            {
                $formularios[] = "psicosocial";
            }
            Session::put('formularios', $formularios);

            
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->username).'|'.request()->ip());
    }
}
