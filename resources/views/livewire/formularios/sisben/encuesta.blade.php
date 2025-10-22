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
        <x-penguin-ui.navigation.breadcrumb-item :href="route('sisben.index')" wire:navigate>
            Formulario Sisben
        </x-penguin-ui.navigation.breadcrumb-item>
        <x-penguin-ui.navigation.breadcrumb-item active=true>
            Encuesta
        </x-penguin-ui.navigation.breadcrumb-item>
    </x-slot>
<form wire:submit.prevent="update">
    <x-evi.formularios.cabecera titulo="F10-Formulario_SISBEN" version="1" />

    @include('partials.evi.formularios.preguntas-beneficiario')

    {{-- Preguntas del formulario sisben --}}
    <h3 class="mt-5 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Sección B10. Asistencia en servicios de salud articulados por el Centro Intégrate
    </h3>
    
    {{-- Pregunta b10.1 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_1">
        B10.1. ¿Recibió asesoría u orientación en el punto de atención del SISBÉN?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b10.2 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_2">
        B10.2. ¿Realizó la inclusión suya o de algún miembro de su núcleo familiar en el SISBÉN?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b10.3 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_3">
        B10.3. ¿Solicitó la modificación de algún dato personal en el SISBÉN?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b10.4 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_4">
        B10.4. 	¿Tramitó el retiro suyo o de algún miembro de su núcleo familiar del SISBÉN?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b10.5 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_5">
        B10.5. ¿Solicitó una nueva encuesta del SISBÉN?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b10.6 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_6">
        B10.6. ¿Fue atendido para una verificación por actualización de datos en el SISBÉN?
    </x-evi.formularios.preguntas>

    {{-- Pregunta b10.7 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_b10_7">
        B10.7. ¿Accedió a algún otro tipo de servicio o trámite relacionado con el SISBÉN? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta b10.8 --}}
    <x-evi.formularios.preguntas wire:model="sisben.otro_servicio" version=2 >
        B10.8. ¿Otro servicio? ¿Cuál?
    </x-evi.formularios.preguntas>
    
    {{-- Pregunta C.1 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_c1">
        C1. ¿Considera que el servicio recibido resolvió su necesidad o asunto en esta visita?
    </x-evi.formularios.preguntas>

    {{-- Pregunta C.2 --}}
    <x-evi.formularios.preguntas wire:model="sisben.pregunta_c2">
        C2. ¿Le interesaría asistir a una reunión grupal donde todos pueden opinar y compartir lo que piensan?
    </x-evi.formularios.preguntas>


    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        D1. Espacio destinado para que el beneficiario exprese libremente sus comentarios, sugerencias, quejas, peticiones o felicitaciones respecto a los servicios recibidos.
    </h3>
    <x-penguin-ui.input.textarea wire:model="sisben.pregunta_d1"/>

    <h3 class="mt-7 p-2 font-semibold dark:bg-surface-alt text-sm bg-surface-dark-alt text-on-surface-dark-strong dark:text-on-surface-strong">
        Observaciones: Espacio exclusivo para el gestor que realiza la entrevista
    </h3>
    <x-penguin-ui.input.textarea wire:model="sisben.observaciones_encuesta" />

    
    <div class="mt-10 flex justify-end">
        <x-penguin-ui.input.button type="submit" variant="primary" target="update">Realizar Cambios</x-penguin-ui.input.button>
    </div>
</form>
</div>
