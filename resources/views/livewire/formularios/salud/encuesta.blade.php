<div>
@if ($warningMessage)
    @foreach($warningMessage as $msg)
        <x-penguin-ui.feedback.notification.warning :message="$msg" />
    @endforeach
@endif

@if ($errorMessage)
    @foreach($errorMessage as $msg)
        <x-penguin-ui.feedback.notification.error  :message="$msg" />
    @endforeach
@endif
<x-slot name="breadcrumb" >
    <x-penguin-ui.navigation.breadcrumb-item :href="route('home')" wire:navigate>
        Home
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item :href="route('salud.index')" wire:navigate>
        Formulario Salud
    </x-penguin-ui.navigation.breadcrumb-item>
    <x-penguin-ui.navigation.breadcrumb-item active=true>
        Encuesta
    </x-penguin-ui.navigation.breadcrumb-item>
</x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F03-Formulario_Salud" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario salud --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B3. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    {{-- Pregunta B3.1 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_1">
        B3.1. ¿Tuvo la oportunidad de participar en jornadas de atención médica general organizadas por el Centro Intégrate?
    </x-evi.formularios.preguntas>


    {{-- Pregunta B3.2 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_2">
        B3.2. ¿Tuvo la oportunidad de participar en jornadas de atención en salud oral organizadas por el Centro Intégrate?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta B3.3 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_3">
        B3.3. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de desparasitación?
    </x-evi.formularios.preguntas>
    


    {{-- Pregunta B3.4 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_4">
        B3.4. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de vacunación?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta B3.5 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_5">
        B3.5. Durante su estancia en el Centro Intégrate, ¿participó en jornadas de aplicación de flúor dental organizadas en el CI?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B3.6 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_6">
        B3.6. Durante su embarazo, ¿recibió servicios de atención prenatal a través del Centro Intégrate?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta B3.7 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_7">
        B3.7. Posterior a su embarazo, ¿recibió servicios de atención en planificación familiar, a través del Centro Intégrate?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B3.8 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_8">
        B3.8. ¿Recibió atención en medicina general y le fueron entregados los medicamentos necesarios para el tratamiento de enfermedades básicas?
    </x-evi.formularios.preguntas>

    {{-- Pregunta B3.9 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_b3_9">
        B3.9. ¿Recibió tratamiento de desparasitación como parte de la atención médica?
    </x-evi.formularios.preguntas>
    {{-- Pregunta B3.10 --}}
    <x-evi.formularios.preguntas wire:model="salud.otro_servicio" version=2 >
        B3.10. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="salud.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="salud.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="salud.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
